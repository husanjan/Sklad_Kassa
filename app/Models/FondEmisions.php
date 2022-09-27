<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FondEmisions extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'date',
        'priznak',
        'naminal',
        'ed_id',
        'kol',
        'summa',
        'serial',
        'nn',
        'safe_id',
        'shkaf_id',
        'qator_id',
        'cell_id',
        'comment',
        'user_id',
        'host',
    ];
    public function edin()
    {
        return $this->hasMany('SprEds');
    }
}
