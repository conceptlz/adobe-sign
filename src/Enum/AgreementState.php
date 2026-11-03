<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * AgreementCreationInfo.state (v6 spec). IN_PROCESS sends immediately.
 */
enum AgreementState: string
{
    case AUTHORING = 'AUTHORING';
    case DRAFT = 'DRAFT';
    case IN_PROCESS = 'IN_PROCESS';
}
