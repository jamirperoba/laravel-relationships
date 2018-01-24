<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class OneToManyController extends Controller
{
	public function oneToMany(){
    	// $country = Country::where('name','Brazil')->get()->first();
		$keySearch = 'Bra';
		$countries = Country::where('name','LIKE', "%{$keySearch}%")->get();
		foreach ($countries as $country) {
			echo "<b>{$country->name}</b>";
			// echo $country->name;

    	// $states = $country->states()->where('initials','RS')->get();
			$states = $country->states;

			foreach($states as $state){
				echo "<br> {$state->initials} - {$state->name}";
			}
			echo "<hr>";
		}
	}
}
