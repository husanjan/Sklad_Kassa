<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SprQators extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'safe_id',
        'shkaf_id',
        'qator',
        'comment',
        'user_id',
        'host',
    ];

}
