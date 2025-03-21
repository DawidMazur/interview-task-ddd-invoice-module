<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Modules\Invoices\Presentation\Http\InvoiceController;
use Ramsey\Uuid\Validator\GenericValidator;

Route::pattern('reference', (new GenericValidator())->getPattern());

Route::get('/invoices/{invoiceUUID}', [InvoiceController::class, 'view'])->name('invoices.show');
