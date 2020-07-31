<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Database\Eloquent\SoftDeletes;

class CiSession extends Model
{
    use Notifiable;
    // use SoftDeletes;

     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'id', 'ip_address', 'timestamp', 'data',
     ];
}
