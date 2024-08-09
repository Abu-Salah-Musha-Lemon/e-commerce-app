<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoppingInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneNumber',
        'presentAddress',
        'postalCode',
    ];
}
