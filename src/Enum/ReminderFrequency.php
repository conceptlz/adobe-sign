<?php

declare(strict_types=1);

namespace Conceptlz\AdobeSign\Enum;

/**
 * AgreementCreationInfo.reminderFrequency / AgreementReminderInfo.frequency (v6 spec).
 */
enum ReminderFrequency: string
{
    case DAILY_UNTIL_SIGNED = 'DAILY_UNTIL_SIGNED';
    case WEEKDAILY_UNTIL_SIGNED = 'WEEKDAILY_UNTIL_SIGNED';
    case EVERY_OTHER_DAY_UNTIL_SIGNED = 'EVERY_OTHER_DAY_UNTIL_SIGNED';
    case EVERY_THIRD_DAY_UNTIL_SIGNED = 'EVERY_THIRD_DAY_UNTIL_SIGNED';
    case EVERY_FIFTH_DAY_UNTIL_SIGNED = 'EVERY_FIFTH_DAY_UNTIL_SIGNED';
    case WEEKLY_UNTIL_SIGNED = 'WEEKLY_UNTIL_SIGNED';
    case ONCE = 'ONCE';
}
