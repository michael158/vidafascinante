<?php

namespace Modules\Admin\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'description', 'admin','facebook','twitter', 'google_plus', 'instagram', 'youtube'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function newUser($data)
    {
        DB::beginTransaction();
        try {
            if (isset($data['image'])) {
                $mUpload = new Upload();
                $data['image'] = !empty($data['image']) ? $mUpload->upload($data['image'], null, 'users'): null;
            }
            $data['password'] = bcrypt($data['password']);
            $post = $this->create($data);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
        }

        DB::commit();

        return $post;
    }

    public function editUser($data , $user)
    {
        DB::beginTransaction();
        try {
            if (isset($data['image'])) {
                $mUpload = new Upload();
                $data['image'] = !empty($data['image']) ? $mUpload->upload($data['image'], null, 'users') : null;
            }

            if (!empty($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            } else {
                unset($data['password']);
            }

            $post = $user->update($data);
        } catch (\Exception $e) {
            throw $e;
            DB::rollback();
        }

        DB::commit();

        return $post;
    }


}
