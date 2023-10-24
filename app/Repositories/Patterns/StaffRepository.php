<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\StaffRequest;
use App\Models\Address;
use App\Models\Staff;
use App\Models\Store;
use App\Repositories\Interfaces\StaffInterface;

class StaffRepository implements StaffInterface {

    public function getAll()
    {
        $staff = Staff::joinaddressstore()
        ->select('staff.firstname', 'staff.lastname', 'staff.username', 'staff.email', 
        'staff.pictureurl',  'addresses.address2', 'addresses.district', 'addresses.street', 
        'addresses.building', 'addresses.googleearthlocation', 'addresses.phone', 
        'addresses.telephone', 'addresses.postalcode', 'stores.name', 'stores.managerfirstname', 
        'stores.managerlastname', 'stores.managerphone', 'stores.type')
        ->paginate(6);

        return $staff;
    }

    public function create(StaffRequest $request)
    {

        $addressid = Address::where('addresses.googleearthlocation',$request->address)->value('id');
        $storeid = Store::where('stores.managerphone',$request->store)->value('id');

        $staff = Staff::create([
            'addresses_id' => $addressid, 
            'stores_id' => $storeid, 
            'firstname' => $request->firstname, 
            'lastname' => $request->lastname, 
            'username' => $request->username, 
            'email' => $request->email, 
            'pictureurl' => $request->pictureurl, 
            'active' => $request->active
        ]);

        return $staff;
    }

    public function getone(string $id)
    {
        $staff = Staff::joinaddressstore()
        ->where('staff.id',$id)
        ->get(['staff.firstname', 'staff.lastname', 'staff.username', 'staff.email', 
        'staff.pictureurl',  'addresses.address2', 'addresses.district', 'addresses.street', 
        'addresses.building', 'addresses.googleearthlocation', 'addresses.phone', 
        'addresses.telephone', 'addresses.postalcode', 'stores.name', 'stores.managerfirstname', 
        'stores.managerlastname', 'stores.managerphone', 'stores.type']);

        return $staff;
    }

    public function update(StaffRequest $request, string $id)
    {
        $addressid = Address::where('addresses.googleearthlocation',$request->address)->value('id');
        $storeid = Store::where('stores.managerphone',$request->store)->value('id');

        $staff = Staff::find($id);
            $staff->addresses_id = $addressid;
            $staff->stores_id = $storeid;
            $staff->firstname = $request->firstname;
            $staff->lastname = $request->lastname;
            $staff->username = $request->username; 
            $staff->email = $request->email; 
            $staff->pictureurl = $request->pictureurl;
            $staff->active = $request->active;
        $staff->update();

        return $staff;
    }

    public function delete(string $id)
    {
        $staff = Staff::find($id);
        $staff->delete();
    }
}