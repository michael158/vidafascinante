<?php

namespace Modules\Admin\Entities;

use App\My\Resume;
use App\My\Util;
use App\Services\FixService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;
use Symfony\Component\EventDispatcher\Tests\Service;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'users_id', 'slug', 'image','active','resume','category_id','activated_at'];
    protected $dates = ['created_at', 'updated_at'];

    public function categorie()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }


    public function tags()
    {
        // model/ Tabela de relacionamento
        return $this->belongsToMany(Tag::class, 'posts_has_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }


    public function newPost($data)
    {
        $service = app()->make(FixService::class);
        DB::beginTransaction();
        try {
            $mUpload = new Upload();
            $data['users_id'] = Auth::user()->id;
            $data['slug'] = str_slug($data['title'], '-');
            $image = $mUpload->upload($data['capa'], $data['slug'], 'posts/cover');
            $data['image'] = $image;
            $data['activated_at'] = Carbon::now();
            $data['content'] = $service->fixContentImagesString($data['content']);
            $data['resume'] = Resume::build()->intelligentResume($data['content']);

            if(!empty($data['schedule_date'])){
                $data['activated_at'] =  Util::datetimeToDatabase($data['schedule_date']);
                $data['active'] = 1;
                unset($data['schedule_date']);
            }

            $result = $this->create($data);
            $result->tags()->sync($data['tags']);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $result;
    }

    public function editPost($data, $post)
    {
        $service = app()->make(FixService::class);
        DB::beginTransaction();
        try {
            $data['slug'] = str_slug($data['title'], '-');
            if (isset($data['capa'])) {
                $mUpload = new Upload();
                $image = $mUpload->upload($data['capa'], $data['slug'], 'posts/cover');
                $data['image'] = $image;
            }

            if(!empty($data['schedule_date'])){
                $data['activated_at'] =  Util::datetimeToDatabase($data['schedule_date']);
                $data['active'] = 1;
                unset($data['schedule_date']);
            }elseif(empty($data['schedule_date'] && $post->active)){
                $data['active'] = 0;
                $data['activated_at'] = $post->created_at;
            }

            $data['content'] = $service->fixContentImagesString($data['content']);
            $data['resume'] = Resume::build()->intelligentResume($data['content']);

            $post->update($data);
            $post->tags()->sync($data['tags']);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();

        return $post;
    }

    public function activate($id){
        DB::beginTransaction();
        try{
            $post = $this->find($id);
            $post->active = 1;
            $post->activated_at = Carbon::now();
            $post->save();
        }catch (\Exception $e){
            DB::rollback();
            throw new Exception ('Aconteceu um erro ao ativar o post!');
        }

        DB::commit();
    }


}
