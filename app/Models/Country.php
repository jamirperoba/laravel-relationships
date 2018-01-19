<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function location(){
    	return $this->hasOne(Location::class, 'country_id','id');
    	return $this->hasOne(Location::class);
    }
}
