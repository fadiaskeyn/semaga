<?php

namespace app\models;

use illuminate\auth\authenticatable;
use illuminate\contracts\auth\authenticatable as authenticatablecontract;
use illuminate\database\eloquent\factories\hasfactory;
use illuminate\database\eloquent\model;
use illuminate\notifications\notifiable;
use laravel\sanctum\hasapitokens;

class student extends model implements authenticatablecontract
{
    use authenticatable, hasapitokens, hasfactory, notifiable;

    protected $tokenname = 'api_token';

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getauthidentifiername()
    {
        return 'nis';
    }

    public function getauthidentifier()
    {
        return $this->{$this->getauthidentifiername()};
    }

    public function getauthpassword()
    {
        return $this->password;
    }
}
