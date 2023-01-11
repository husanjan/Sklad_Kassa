<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Ostatki_safe extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [

     'date',
     'src',
     'naminal',
     'ed_id',
     'summa',
     'priznak',
     'safe_id',
     'shkaf_id',
     'qator_id',
     'cell_id',
     'type',
     'comment',
     'typeFond',
     'user_id',
     'host'
     ];
}
