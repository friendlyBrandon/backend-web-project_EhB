<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CommentsOnNews;

class News extends Model
{
    protected $fillable = [
    'title',
    'content',
    'image',
    'published',
];
    public function comments()
{
    return $this->hasMany(CommentsOnNews::class);
}
}