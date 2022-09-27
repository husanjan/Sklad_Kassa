<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oborot extends Model
{
    use HasFactory;
    protected $fillable = [
        'kod_oper',
        'nominal',
        'summa',
        'comment',
        'priznak',
        'account_id_out',
        'Bik',
        'account_id_in',
        'user_id',
        'date',
        'host',

    ];
}
