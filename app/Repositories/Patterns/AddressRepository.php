<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\City;
use App\Repositories\Interfaces\AddressInterface;

class AddressRepository implements AddressInterface {
    public function getAll()
    {
        $addresses = Address::joincity()
        ->select('addresses.address2', 'addresses.district', 'addresses.street', 'addresses.building',
        'addresses.googleearthlocation', 'addresses.phone', 'addresses.telephone', 
        'addresses.postalcode', 'cities.name', 'cities.governorate')
        ->paginate(6);

        return $addresses;
    }

    public function create(AddressRequest $request)
    {
        $city = City::where('cities.name',$request->city)->value('id');

        $address = Address::create([
            'cities_id' => $city, 
            'address2' => $request-> address2, 
            'district' => $request-> district, 
            'street' => $request->street, 
            'building' => $request->building, 
            'googleearthlocation' => $request->googleearthlocation, 
            'phone' => $request->phone, 
            'telephone' => $request->telephone, 
            'postalcode' => $request->postalcode
        ]);

        return $address;
    }

    public function getone(string $id)
    {
        $address = Address::joincity()
        ->where('addresses.id',$id)
        ->get(['addresses.address2', 'addresses.district', 'addresses.street', 'addresses.building',
        'addresses.googleearthlocation', 'addresses.phone', 'addresses.telephone', 
        'addresses.postalcode', 'cities.name', 'cities.governorate']);

        return $address;
    }

    public function update(AddressRequest $request, string $id)
    {
        $city = City::where('cities.name',$request->city)->value('id');

        $address = Address::find($id);
        $address->cities_id = $city;
        $address->address2 = $request-> address2;
        $address->district = $request-> district; 
        $address->street = $request->street;
        $address->building = $request->building; 
        $address->googleearthlocation = $request->googleearthlocation;
        $address->phone = $request->phone;
        $address->telephone = $request->telephone;
        $address->postalcode = $request->postalcode;
        $address->update();

        return $address;

    }

    public function delete(string $id)
    {
        $address = Address::find($id);
        $address->delete();
    }
}