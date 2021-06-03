<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seri extends Model
{
    use HasFactory;

    protected $fillable = [
        'seri',
        'item_id',
        'item_name',
        'type_id',
        'type_name',
        'is_open',
        'invoice_id',
        'employee_id',
        'employee_name',
        'customer_id',
        'customer_name',
        'date',
        'modify_by',

    ];
}
