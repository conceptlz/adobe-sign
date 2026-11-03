<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * AgreementCreationInfo.signatureType (v6 spec).
 */
enum SignatureType: string
{
    case ESIGN = 'ESIGN';
    case WRITTEN = 'WRITTEN';
}
