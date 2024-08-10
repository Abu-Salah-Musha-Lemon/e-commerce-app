<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping_addresses extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneNumber',
        'presentAddress',
        'postalCode',
        'userId',
    ];
}
