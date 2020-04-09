<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login_Admin extends Authenticatable
{
    protected $table = 'petugas';
    public $timestaps = false;
}
