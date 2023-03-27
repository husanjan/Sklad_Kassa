<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kode_Oper extends Model
{

    protected $table = 'kode_oper';

    use HasFactory;
    protected $fillable = [
        'datetime',
        'kode_oper',
        'Prikhod',
        'Raskhod',
        'Summa',
        'user_id',
        'host',
        'summa',
   
        
    ];
}
