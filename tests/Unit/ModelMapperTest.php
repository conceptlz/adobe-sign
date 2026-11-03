<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Tests\Unit;

use Conceptlz\AdobeSign\Builder\AgreementInfo;
use Conceptlz\AdobeSign\Builder\ParticipantSetInfo;
use Conceptlz\AdobeSign\Exception\InvalidArgumentException;
use Conceptlz\AdobeSign\Generated\Model\AgreementCreationInfo;
use Conceptlz\AdobeSign\Generated\Model\BaseUriInfo;
use Conceptlz\AdobeSign\Generated\Model\FetchedAgreementInfo;
use Conceptlz\AdobeSign\Generated\Model\ParticipantSetInfo as GeneratedParticipantSetInfo;
use Conceptlz\AdobeSign\Generated\Model\ParticipantSetMemberInfo;
use Conceptlz\AdobeSign\Generated\Model\SettingData;
use Conceptlz\AdobeSign\Generated\Model\WebhookConditionalParams;
use Conceptlz\AdobeSign\Hydration\ModelMapper;
use Conceptlz\AdobeSign\Tests\TestCase;

final class ModelMapperTest extends TestCase
{
    public function test_hydrates_nested_lists_of_models(): void
    {
        $info = ModelMapper::hydrate(FetchedAgreementInfo::class, self::fixture('agreement'));

        self::assertSame('Mutual NDA', $info->getName());
        self::assertSame('OUT_FOR_SIGNATURE', $info->getStatus());
        self::assertSame('2026-11-03T10:15:35Z', $info->getLastEventDate(), 'type:date kept as string');

        $sets = $info->getParticipantSetsInfo();
        self::assertContainsOnlyInstancesOf(GeneratedParticipantSetInfo::class, $sets);
        self::assertSame(1, $sets[0]->getOrder());
        self::assertContainsOnlyInstancesOf(ParticipantSetMemberInfo::class, $sets[0]->getMemberInfos());
        self::assertSame('jane@example.com', $sets[0]->getMemberInfos()[0]->getEmail());
    }

    public function test_round_trips_fixture(): void
    {
        $data = self::fixture('agreement');

        self::assertEquals($data, ModelMapper::toArray(ModelMapper::hydrate(FetchedAgreementInfo::class, $data)));
    }

    public function test_unknown_keys_and_mistyped_values_are_skipped(): void
    {
        $info = ModelMapper::hydrate(BaseUriInfo::class, [
            'apiAccessPoint' => 'https://api.na1.adobesign.com/',
            'brandNewField' => 'ignored',
            'webAccessPoint' => ['not' => 'a string'],
        ]);

        self::assertSame('https://api.na1.adobesign.com/', $info->getApiAccessPoint());
        self::assertFalse($info->isInitialized('webAccessPoint'));
        self::assertSame(['apiAccessPoint' => 'https://api.na1.adobesign.com/'], ModelMapper::toArray($info));
    }

    public function test_coerces_loosely_typed_scalars(): void
    {
        $set = ModelMapper::hydrate(GeneratedParticipantSetInfo::class, [
            'order' => '2',
            'isDigitalSignatureRequired' => 'true',
            'role' => 'SIGNER',
        ]);

        self::assertSame(2, $set->getOrder());
        self::assertTrue($set->getIsDigitalSignatureRequired());
    }

    public function test_free_form_object_property_passes_through(): void
    {
        $setting = ModelMapper::hydrate(SettingData::class, ['value' => ['anything' => [1, 2]]]);

        self::assertSame(['anything' => [1, 2]], $setting->getValue());
    }

    public function test_single_model_property(): void
    {
        $params = ModelMapper::hydrate(WebhookConditionalParams::class, [
            'webhookAgreementEvents' => ['includeDetailedInfo' => true],
        ]);

        self::assertTrue($params->getWebhookAgreementEvents()->getIncludeDetailedInfo());
    }

    public function test_builder_payload_survives_the_generated_model(): void
    {
        $builder = AgreementInfo::create('NDA')
            ->file('tdoc-1')
            ->participantSet(ParticipantSetInfo::signer('jane@example.com')->privateMessage('hi'))
            ->externalId('crm-1')
            ->expiresAt(new \DateTimeImmutable('2026-12-01T00:00:00Z'));

        $model = $builder->toModel();

        self::assertInstanceOf(AgreementCreationInfo::class, $model);
        self::assertSame('crm-1', $model->getExternalId()->getId());
        self::assertEquals($builder->toArray(), ModelMapper::toArray($model), 'every builder field exists in the spec');
    }

    public function test_create_accepts_generated_model(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement_created');

        $model = AgreementInfo::create('NDA')->file('tdoc-1')->signers('jane@example.com')->toModel();
        $model->setMessage('Set on the generated model');

        $this->client()->agreements()->create($model);

        self::assertSame('Set on the generated model', self::jsonBody($this->request(1))['message']);
        self::assertSame([['transientDocumentId' => 'tdoc-1']], self::jsonBody($this->request(1))['fileInfos']);
    }

    public function test_agreement_details_exposes_generated_model(): void
    {
        $this->queueBaseUris();
        $this->queue(200, 'agreement');

        $details = $this->client()->agreements()->get('agr-1')->details();

        self::assertInstanceOf(FetchedAgreementInfo::class, $details);
        self::assertSame('en_US', $details->getLocale());
    }

    public function test_rejects_non_generated_classes(): void
    {
        $this->expectException(InvalidArgumentException::class);

        ModelMapper::hydrate(\stdClass::class, []);
    }
}
