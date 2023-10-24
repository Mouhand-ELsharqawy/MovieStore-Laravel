<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\CountryRequest;
use App\Models\Country;
use App\Repositories\Interfaces\CountryInterface;

class CountryRepository implements CountryInterface {
    public function getAll()
    {
        $countries = Country::paginate(6);
        return $countries;
    }

    public function create(CountryRequest $request)
    {
        $country = Country::create([
            'name' => $request->name
        ]);

        return $country;
    }

    public function getone(string $id)
    {
        $country = Country::find($id);
        return $country;
    }

    public function update(CountryRequest $request, string $id)
    {
        $country = Country::find($id);
        $country->name = $request->name;
        return $country;
    }

    public function delete(string $id)
    {
        $country = Country::find($id);
        $country->delete();
    }
}