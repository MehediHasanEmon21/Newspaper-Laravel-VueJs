<?php

namespace App\Model;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $with = ['post', 'user'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
