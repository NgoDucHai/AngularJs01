<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
   protected $filltable = 'images_restaurants';
   protected $fillable = ['id', 'name', 'restaurants_id'];

   public function Restaurant()
   {
   		return $this->hasMany('App\Restaurant');
   }
}
