<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsOnNews extends Model
{
    protected $table = 'comments_on_news';

    protected $fillable = [
        'user_id',
        'news_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}