<?php

namespace Modules\Blog\Services;

use Carbon\Carbon;
use Modules\Blog\Entities\Post;

class RecommendedService
{

    private $order = ['desc', 'asc'];

    public function getRecommendedPosts($tags, $excludeId)
    {
        $processedTags = $this->tagsToArray($tags);
        $posts = $this->query($processedTags, $excludeId);
        return $posts;
    }


    private function tagsToArray($tags)
    {
        $return = [];
        foreach ($tags as $tag)
            $return[] = $tag->name;

        return $return;
    }


    private function query($tags, $excludeId)
    {
        $posts = Post::whereHas('tags' , function($query)use($tags){
            $query->whereIn('tags.name',$tags);
        })->where('id','<>', $excludeId)->where('active', 1)
            ->where('activated_at', '<=', Carbon::now())->limit(4)->orderBy('views',$this->order[rand(0,1)])->get();

        return $posts;
    }




}