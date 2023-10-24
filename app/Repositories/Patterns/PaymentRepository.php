<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\PaymentRequest;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\Staff;
use App\Repositories\Interfaces\PaymentInterface;

class PaymentRepository implements PaymentInterface {
    public function getAll()
    {
        $payments = Payment::joinrentalcustomerstaff()
        ->select('payments.amount', 'payments.paymentdate', 'rentals.rentaldate', 
        'rentals.returndate', 'customers.firstname', 'customers.lastname', 'customers.address', 
        'customers.phonenumber', 'customers.telephone', 'staff.username', 
        'staff.email', 'staff.pictureurl')
        ->paginate(6);
        return $payments;
    }

    public function create(PaymentRequest $request)
    {

        $rentalid = Rental::where('rentals.rentaldate',$request->rental)->value('id');
        $cutomerid = Customer::where('customers.phonenumber', $request->customer)->value('id');
        $staffid = Staff::where('staff.email',$request->staff)->value('id'); 


        $payment = Payment::create([
            'rentals_id' => $rentalid, 
            'customers_id' => $cutomerid, 
            'staff_id' => $staffid, 
            'amount' => $request->amount, 
            'paymentdate' => $request->paymentdate
        ]);

        return $payment;
    }

    public function getone(string $id)
    {
        $payment = Payment::joinrentalcustomerstaff()
        ->where('payments.id',$id)
        ->get(['payments.amount', 'payments.paymentdate', 'rentals.rentaldate', 
        'rentals.returndate', 'customers.firstname', 'customers.lastname', 'customers.address', 
        'customers.email', 'customers.phonenumber', 'customers.telephone', 'staff.username', 
        'staff.email', 'staff.pictureurl']);

        return $payment;
    }

    public function update(PaymentRequest $request, string $id)
    {
        $rentalid = Rental::where('rentals.rentaldate',$request->rental)->value('id');
        $cutomerid = Customer::where('customers.phonenumber', $request->customer)->value('id');
        $staffid = Staff::where('staff.email',$request->staff)->value('id'); 


        $payment = Payment::find($id);
            $payment->rentals_id = $rentalid; 
            $payment->customers_id = $cutomerid; 
            $payment->staff_id = $staffid;
            $payment->amount = $request->amount;
            $payment->paymentdate = $request->paymentdate;
        $payment->update();

        return $payment;
    }

    public function delete(string $id)
    {
        $payment = Payment::find($id);
        $payment->delete();
    }
}