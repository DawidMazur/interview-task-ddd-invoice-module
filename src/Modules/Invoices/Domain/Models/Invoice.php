<?php

declare(strict_types=1);

namespace Modules\Invoices\Domain\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Invoices\Domain\Enums\InvoiceStatus;

class Invoice extends Model
{
    use HasUuids;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'status',
    ];

    protected $casts = [
        'status' => InvoiceStatus::class,
    ];

    /**
     * @return HasMany<InvoiceProductLine, $this>
     */
    public function productLines(): HasMany
    {
        return $this->hasMany(InvoiceProductLine::class);
    }

    public function getTotalPriceAttribute(): int
    {
        return $this->productLines->sum('total_unit_price');
    }
}
