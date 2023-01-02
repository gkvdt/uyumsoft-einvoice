<?php

namespace Modules\EInvoice\Entities;

use Illuminate\Database\Eloquent\Model;

class WsUser extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'password'
    ];


    
    public function getWsUser(){
        return [
            'userInfo' => [
                'Username'=> $this->username,
                'Password' => $this->password
            ]
        ];
    }
}
