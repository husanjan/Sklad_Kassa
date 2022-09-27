<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SprEds extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'money',
        'name',
        'kol',
        'comment',
        'user_id',
        'host',
    ];

}
