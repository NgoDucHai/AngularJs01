<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = array('id_restaurant', 'name', 'address','phone','img');

    public function Users()
    {
    	return $this->hasMany('App\User');
    }

    public function Images()
    {
    	return $this->belongsTo('App\Images');
    }
}
