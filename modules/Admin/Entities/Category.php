<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','main'];
    protected $dates = ['created_at', 'updated_at'];


    public function newCateogory($data)
    {
        DB::beginTransaction();
        try {
            $result = $this->create($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $result;
    }

    public function editCategory($data, $post)
    {
        DB::beginTransaction();
        try {
            $post->update($data);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $post;
    }

    public function toSelect(){
        $categories = $this->orderBy('id', 'desc')->get(['name', 'id']);
        return $categories;
    }

    public static function build()
    {
        static $instance = null;

        if (is_null($instance))
            $instance = new self;

        return $instance;
    }


}
