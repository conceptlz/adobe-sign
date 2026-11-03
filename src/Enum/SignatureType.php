<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * AgreementCreationInfo.signatureType (v6 spec).
 */
enum SignatureType: string
{
    /** Signed electronically. */
    case ESIGN = 'ESIGN';
    /** Signed by hand; the signed document is uploaded afterwards. */
    case WRITTEN = 'WRITTEN';
}
