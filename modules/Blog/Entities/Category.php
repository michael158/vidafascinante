<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $dates = ['created_at', 'updated_at'];


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
