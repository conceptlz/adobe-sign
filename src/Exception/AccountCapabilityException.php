<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Exception;

/**
 * The request is valid, but the Acrobat Sign account doesn't allow it: a feature that is off in its
 * settings, not in its plan, or out of quota. Fix it in Acrobat Sign admin, not in code.
 *
 * Seen live: HYBRID_ROUTING_NOT_ALLOWED (mixed sequential/parallel signing order),
 * GOV_ID_LIMIT_EXCEEDED (no government-ID verification quota), and 400 BAD_REQUEST for an identity
 * method the account doesn't enable ("not allowed by account settings"). The other quota and
 * feature codes in ErrorMapper::CODES come from the v6 spec.
 */
class AccountCapabilityException extends ApiException
{
}
