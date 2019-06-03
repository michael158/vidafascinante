<?php

namespace Modules\Blog\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class Post extends Model
{
    protected $fillable =  ['views'];
     protected $dates = ['created_at', 'updated_at'];

    public function tags()
    {
        // model/ Tabela de relacionamento
        return $this->belongsToMany(Tag::class,'posts_has_tags');
    }

    public function categorie()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'users_id');
    }


    public function getRanking(){
        return $this->where('active', 1)
            ->where('activated_at', '<=', Carbon::now())
            ->orderBy('views', 'desc')->limit(3)->get();
    }

    public function getMostRecent(){
        $data = $this->where('active', 1)
            ->where('activated_at', '<=', Carbon::now())
            ->orderBy('activated_at', 'desc')->limit(3)->get();

        return $data;
    }

    public static function build()
    {
        static $instance = null;

        if (is_null($instance))
            $instance = new self;

        return $instance;
    }



}
