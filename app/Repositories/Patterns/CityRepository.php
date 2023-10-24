<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\CityRequest;
use App\Models\City;
use App\Models\Country;
use App\Repositories\Interfaces\CityInterface;

class CityRepository implements CityInterface {
    public function getAll()
    {
        $cities = City::joincountry()
        ->select('cities.name', 'cities.governorate','countries.name')
        ->paginate(6);

        return $cities;
    }

    public function create(CityRequest $request)
    {
        $countryid = Country::where('countries.name',$request->country)->value('id');
        $city = City::create([
            'name' => $request->name, 
            'governorate' => $request->governorate, 
            'countries_id' => $countryid
        ]);

        return $city;
    }

    public function getone(string $id)
    {
        $city = City::joincountry()
        ->where('cities.id')
        ->get(['cities.name', 'cities.governorate','countries.name']);

        return $city;
    }

    public function update(CityRequest $request, string $id)
    {
        $countryid = Country::where('countries.name',$request->country)->value('id');
        $city = City::find($id);
        $city->name = $request->name; 
        $city->governorate = $request->governorate;
        $city->countries_id = $countryid;
        $city->update();

        return $city;
    }

    public function delete(string $id)
    {
        $city = City::find($id);
        $city->delete();
    }
}