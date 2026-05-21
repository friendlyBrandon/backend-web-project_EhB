<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportForum extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}