<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
<<<<<<< HEAD
    protected $fillable = ['title', 'content', 'category_id', 'image', 'likes', 'user_id'];
=======
    protected $fillable = ['title', 'content', 'category_id'];
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
<<<<<<< HEAD

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
=======
>>>>>>> b72420539c83ec3c7c874ed3047368a0a558a994
}
