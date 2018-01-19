<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
	public function oneToOne(){
		$country = Country::find(1);
    	// $country = Country::Where('name','Brazil')->get();
    	// dd($country[0]['name']);
    	// $location = $country[0]['location'];
    	// echo $country[0]['name'];
    	// $location = $country->location()->get()->first();
		echo $country->name;
		$location = $country->location;
		echo "<hr>Latitude: {$location->latitude}<br>";
		echo "<hr>Longitude: {$location->longitude}<br>";
	}
	public function oneToOneInverse(){
		$latitude = 123;
		$longitude = 321;
		$location = Location::where('latitude',$latitude)
		->where('longitude',$longitude)
		->get()
		->first();
		$country = $location->country;
		echo $country->name;
		// echo $location->id;
	}
	public function oneToOneInsert(){

		$dataForm = ['name' => 'Alemanha' ,
					'latitude' => 890 ,
					'longitude' => 998 
					];
		$country = Country::create($dataForm);
		$dataForm = ['country_id' => $country->id];
		$location = Location::create($dataForm);
		// $location = new Location;
		// $location->latitude = $dataForm['latitude'];
		// $location->latitude = $dataForm['latitude'];
		// $location->country_id = $country->id;
		// $saveLocation = $location->save();
	}
}
