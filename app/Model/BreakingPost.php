<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BreakingPost extends Model
{
    protected $with = ['post'];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
