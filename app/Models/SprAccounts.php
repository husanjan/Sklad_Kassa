<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SprAccounts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'account',
        'name',
        'comment',
        'user_id',
        'host',
    ];

}
