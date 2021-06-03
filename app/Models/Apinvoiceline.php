<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apinvoiceline extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'seri',
        'item_id',
        'item_name',
        'price',
        'currency',
        'reason_id',
        'reason_name',
        'type',
        'apinvoice_id',
        'apinvoice_code',
        'user_id',
        'user_name',
        'customer_id',
        'customer_name',
        'date',
        'modify_by',
        'is_open',
      
    ];
}
