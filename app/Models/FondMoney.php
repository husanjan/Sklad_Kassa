<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FondMoney extends Model
{
    use HasFactory, SoftDeletes;
      protected $fillable = [

       'ed_id',
       'date',
       'priznak',
       'type',
       'src',
       'naminal',
        'kol',
       'summa',
       'safe_id',
       'shkaf_id',
       'qator_id',
       'cell_id',
       'comment',
       'user_id',
       'n_doc',
       'kode_oper',
       'host',
       
       
        ];
}
