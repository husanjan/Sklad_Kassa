<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SprSafes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'safe',
        'comment',
        'user_id',
        'host',
    ];

}
