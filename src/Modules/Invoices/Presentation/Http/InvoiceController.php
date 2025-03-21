<?php

declare(strict_types=1);

namespace Modules\Invoices\Presentation\Http;

use Illuminate\Http\JsonResponse;
use Modules\Invoices\Domain\Models\Invoice;
use Modules\Invoices\Presentation\Http\Resources\InvoiceResource;
use Symfony\Component\HttpFoundation\Response;

final readonly class InvoiceController
{
    public function view(string $invoiceUUID): JsonResponse
    {
        $invoice = Invoice::findOrFail($invoiceUUID);

        return new JsonResponse(
            data: InvoiceResource::make($invoice),
            status: Response::HTTP_OK
        );
    }
}
