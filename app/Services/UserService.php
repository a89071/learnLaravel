<?php


namespace App\Services;


use App\Models\User;

class UserService
{

    /**
     * @abstract 根据用户名获取用户
     * @param $username
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getByUserName($username)
    {
        return User::query()
          ->where('username', $username)
          ->where('deleted', 0)
          ->first();
    }

    /**
     * @abstract 根据手机号获取用户
     * @param $mobile
     * @return \App\Models\User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getByMobile($mobile)
    {
        return User::query()
          ->where('mobile', $mobile)
          ->where('deleted', 0)
          ->first();
    }

}