<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arinvoiceline extends Model
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
        'arinvoice_id',
        'arinvoice_code',
        'user_id',
        'user_name',
        'customer_id',
        'customer_name',
        'date',
        'modify_by',
        'is_open',
        'arline_id',
      
    ];
}
