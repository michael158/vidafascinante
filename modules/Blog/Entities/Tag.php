<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_has_tags');
    }


}
