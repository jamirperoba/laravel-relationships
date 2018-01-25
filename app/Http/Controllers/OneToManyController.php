<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany(){
    	$country = Country::where('name','Brasil')->get()->first();
    	echo $country->name;
    	// $states = $country->states;
    	$states = $country->states()->where('initials','RS')->get();
    	foreach ($states as $state) {
    		echo "<hr>{$state->initials} - {$state->name}";
    	}
    }
}
