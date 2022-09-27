<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SprBank extends Model
{

    use HasFactory,SoftDeletes;
    protected $fillable = [
        'BIK',
        'full_name',
        'short_name',
        'comment',
        'host',
        'user_id',
    ];
}
