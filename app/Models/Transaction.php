<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'employee_surname',
        'sender_name',
        'sender_surname',
        'recipient_name',
        'recipient_surname',
        'sender_account',
        'recipient_account',
        'amount',
    ];
}
