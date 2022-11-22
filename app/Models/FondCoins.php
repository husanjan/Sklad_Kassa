<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FondCoins extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'date',
        'priznak',
        'type',
        'src',
        'kol',
        'naminal',
        'ed_id',
        'summa',
        'safe_id',
        'shkaf_id',
        'qator_id',
        'cell_id',
        'kode_oper',
        'comment',
        'n_doc',
        'user_id',
        'host',
        
    ];
}
