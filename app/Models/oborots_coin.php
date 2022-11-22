<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class oborots_coin extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        
        'date',
        'priznak',
        'type',
        'src',
        'naminal',
      
        'summa',
        'comment',
        'user_id',
        'n_doc',
        'kod_oper',
        'host',
        
        
         ];
}
