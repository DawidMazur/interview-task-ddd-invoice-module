<?php

declare(strict_types=1);

namespace Modules\Invoices\Domain\Enums;

enum InvoiceStatus: string
{
    case Draft = 'draft';
    case Sending = 'sending';
    case SentToClient = 'sent-to-client';
}
