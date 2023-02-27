<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OstatkiSchet extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [

        'date',
        'priznak',
        'priod',
        'src',
        'Prikhod',
        'Raskhod',
        'FondType',
        'type',
        'ostatok_start',
        'ostatok_end',
        'user_id',
        'host',
        'kode_oper',
        
        ];
}
