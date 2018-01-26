<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
	public function oneToMany(){

    	// $country = Country::where('name','Brasil')->get()->first();
		$KeySearch = 'a';
		// $countries = Country::where('name','LIKE',"%{$KeySearch}%")->get();
		//with passa o metoto states do model Country ja relacionando
		$countries = Country::where('name','LIKE',"%{$KeySearch}%")->with('states')->get();
		//dd($countries);
		foreach ( $countries as $country ) {
			echo "<b> {$country->name} </b>";
			$states = $country->states;
    		// $states = $country->states()->where('initials','RS')->get();
			foreach ($states as $state) {
				echo "<br> {$state->initials} - {$state->name}";
			}
			echo "<hr>";
		}
	}
	public function manyToOne(){
		$stateName = 'Rio Grande do Sul';
		$state = State::where('name', $stateName)->get()->first();
		echo "<b> {$state->name} </b>";
		$country = $state->country;
		echo "<br>Pais:{$country->name}";
	}
	public function oneToManyTwo(){
		// $country = Country::where('name','Brasil')->get()->first();
		$KeySearch = 'a';
		// $countries = Country::where('name','LIKE',"%{$KeySearch}%")->get();
		//with passa o metoto states do model Country ja relacionando
		$countries = Country::where('name','LIKE',"%{$KeySearch}%")->with('states')->get();
		//dd($countries);
		foreach ( $countries as $country ) {
			echo "<b> {$country->name} </b>";
			$states = $country->states;
    		// $states = $country->states()->where('initials','RS')->get();
			foreach ($states as $state) {
				echo "<br> {$state->initials} - {$state->name}:";

				foreach ($state->cities as $city) {
					echo " {$city->name},";
				}
				echo "<hr>";
			}
		}
	}
	public function oneToManyInsert(){
		$dataForm = [
			'name' =>'Bahia',
			'initials' =>'BA', 
		];
		$country = Country::find(1);
		$insertState = $country->states()->create($dataForm);
		var_dump($insertState->name);

	}
	public function oneToManyInsertTwo(){
		$dataForm = [
			'name' =>'Bahia',
			'initials' =>'BA',
			'country_id'=>'1', 
		];
		$insertState = State::create($dataForm);
		var_dump($insertState->name);

	}
}
