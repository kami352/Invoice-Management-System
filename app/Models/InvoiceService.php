<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceService extends Model
{
    use HasFactory;

    protected $table = 'invoice_service';
    protected $fillable = [
    	'invoice_id',
    	'service_id',
    ];
}
