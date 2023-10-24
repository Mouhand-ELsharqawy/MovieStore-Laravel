<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Repositories\Interfaces\CustomerInterface;

class CustomerRepository implements CustomerInterface {
    public function getAll()
    {
        $customers = Customer::paginate(6);
        return $customers;
    }

    public function create(CustomerRequest $request)
    {
        $customer = Customer::create([
            'firstname' => $request->firstname, 
            'lastname' => $request->lastname, 
            'address' => $request->address, 
            'email' => $request->email, 
            'phonenumber' => $request->phonenumber, 
            'telephone' => $request->telephone, 
            'active' => $request->active
        ]);

        return $customer;
    }

    public function getone(string $id)
    {
        $customer = Customer::find($id);
        return $customer;
    }

    public function update(CustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phonenumber = $request->phonenumber;
        $customer->telephone = $request->telephone;
        $customer->active = $request->active;
        $customer->update();
        

        return $customer;   
    }

    public function delete(string $id)
    {
        $customer = Customer::find($id);
        $customer->delete();
    }
}