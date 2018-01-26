<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country(){
    	return $this->belongsTo(Country::class);
    	// return $this->belongsTo(Country::class,'country_id','id');//caso os id de relacionamaneto sejam diferentes

    }
    public function cities(){
    	return $this->hasMany(City::class);
    }
}
