<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;

use Illuminate\Database\Eloquent\Model;

class WsUser extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'password'
    ];



    public function getWsUser()
    {
        return [
            'userInfo' => [
                'Username' => $this->username,
                'Password' => $this->password
            ]
        ];
    }

    public static function getUsernamePassword($user_id)
    {
        $wsUser = self::getWsUserFromUserId($user_id);
        if ($wsUser) return $wsUser['userInfo'];
        return [
            'Username' => 'Uyumsoft', 
            'Password' => 'Uyumsoft', 
        ];
    }

    public static function getWsUserFromUserId($user_id)
    {
        $wsUser = WsUser::where('user_id', $user_id)->first();
        if ($wsUser) return $wsUser->getWsUser();
        return false;
    }
}
