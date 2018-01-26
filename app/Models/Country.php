<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['name'];
    
    public function location(){
    	return $this->hasOne(Location::class);
    	// return $this->hasOne(Location::class, 'country_id','id');
    }
    public function states(){
    	return $this->hasMany(State::class);
    	return $this->hasMany(State::class,'country_id','id');
    }
}
