<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apinvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'customer_id',
        'customer_name',
        'user_id',
        'user_name',
        'user_note',
        'reason_id',
        'reason_name',
        'currency',
        'type',
        'date',
        'modify_by',
      
    ];

}
