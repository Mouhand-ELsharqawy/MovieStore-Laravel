<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\RentalRequest;
use App\Models\Customer;
use App\Models\Rental;
use App\Models\Staff;
use App\Repositories\Interfaces\RentalInterface;

class RentalRepository implements RentalInterface {

    public function getAll()
    {
        $rentals = Rental::joininventorycustomerstaff()
        ->select('rentals.rentaldate', 'rentals.returndate', 'customers.firstname', 
        'customers.lastname', 'customers.address', 'customers.email', 'customers.phonenumber', 
        'customers.telephone', 'staff.username', 'staff.email', 'staff.pictureurl')
        ->paginate(6);

        return $rentals;
    }

    public function create(RentalRequest $request)
    {
        $customerid = Customer::where('customers.phonenumber', $request->customer)->value('id');
        $staffid = Staff::where('staff.email',$request->staff)->value('id'); 

        $rental = Rental::create([
            'staff_id' => $staffid, 
            'customers_id' => $customerid, 
            'inventories_id' => $request->inventory, 
            'rentaldate' => $request->rentaldate, 
            'returndate' => $request->returndate
        ]);

        return $rental;
    }

    public function getone(string $id)
    {
        $rental = Rental::joininventorycustomerstaff()
        ->where('rentals.id',$id)
        ->get(['rentals.rentaldate', 'rentals.returndate', 'customers.firstname', 
        'customers.lastname', 'customers.address', 'customers.email', 'customers.phonenumber', 
        'customers.telephone', 'staff.username', 'staff.email', 'staff.pictureurl']);

        return $rental;
    }

    public function update(RentalRequest $request, string $id)
    {
        $customerid = Customer::where('customers.phonenumber', $request->customer)->value('id');
        $staffid = Staff::where('staff.email',$request->staff)->value('id'); 

        $rental = Rental::find($id);
        $rental->staff_id = $staffid;
        $rental->customers_id = $customerid;
        $rental->inventories_id = $request->inventory; 
        $rental->rentaldate = $request->rentaldate; 
        $rental->returndate = $request->returndate;

        $rental->update();

        return $rental;
    }

    public function delete(string $id)
    {
        $rental = Rental::find($id);
        $rental->delete();
    }
}