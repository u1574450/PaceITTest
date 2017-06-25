<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  public $fillable = ['first_name','last_name','phone','email'];
}
