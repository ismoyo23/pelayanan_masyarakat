<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_Masyarakat extends Authenticatable
{
    protected $table = 'masyarakat';
    public $timestaps = false;
}
