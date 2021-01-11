<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = ['category', 'admin'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
