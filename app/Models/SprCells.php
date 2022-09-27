<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SprCells extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'safe_id',
        'shkaf_id',
        'qator_id',
        'cell',
        'comment',
        'user_id',
        'host',
    ];
}
