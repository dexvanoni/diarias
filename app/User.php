<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;
  protected $connection = 'pgsql';
  protected $table = 'tb_pessoas';

  protected $primaryKey = 'pesid';

  public function pessoa()
  {
    return $this->hasOne('Pessoa');
  }
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'pescodigo', 'sasis_senha',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];
}
