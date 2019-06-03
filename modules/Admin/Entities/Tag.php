<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'posts_has_tags');
    }


    public function newTag($data)
    {
        DB::beginTransaction();
        try {
            $tag = $this->create($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();

        return $tag;
    }

    public function editTag($data, $post)
    {
        DB::beginTransaction();
        try {
           $tag =  $post->update($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $tag;
    }


    public function toSelect(){
        $tags = $this->orderBy('id', 'desc')->get(['name', 'id']);
        return $tags;
    }

    public static function build()
    {
        static $instance = null;

        if (is_null($instance))
            $instance = new self;

        return $instance;
    }



}
