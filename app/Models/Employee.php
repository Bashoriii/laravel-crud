<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'phone',
        'email',
        'province',
        'city',
        'street',
        'zip_code',
        'ktp_number',
        'current_position',
        'bank_account',
        'bank_account_number'
    ];
}
