<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'is_input',
        'is_active',
        'type',
        'modify_by'

    ];
}
