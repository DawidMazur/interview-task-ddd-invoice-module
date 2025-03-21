<?php

declare(strict_types=1);

namespace Modules\Invoices\Domain\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceProductLine extends Model
{
    use HasUuids;

    protected $fillable = [
        'invoice_id',
        'name',
        'price',
        'quantity',
    ];

    protected $appends = [
        'total_unit_price',
    ];

    /**
     * @return BelongsTo<Invoice, $this>
     */
    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getTotalUnitPriceAttribute(): int
    {
        return $this->quantity * $this->unit_price;
    }
}
