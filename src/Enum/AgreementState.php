<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * The state a new agreement lands in (AgreementCreationInfo.state, v6 spec).
 *
 * Covers the states used when creating; the spec enum also lists RESTART, IN_REVISION and
 * PAUSED, which AgreementInfo::state() accepts as strings. To change an existing agreement's
 * state use Agreements::updateState().
 */
enum AgreementState: string
{
    /** Created for field placement in Adobe's authoring page, not yet sent. */
    case AUTHORING = 'AUTHORING';
    /** Saved as a draft, not sent. */
    case DRAFT = 'DRAFT';
    /** Sent to the first participants immediately. */
    case IN_PROCESS = 'IN_PROCESS';
}
