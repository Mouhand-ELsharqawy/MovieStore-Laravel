<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['id', 'rentals_id', 'customers_id', 'staff_id', 'amount', 'paymentdate'];

    public function scopeJoinrentalcustomerstaff(Builder $builder){
        $builder->join('rentals','payments.rentals_id','=','rentals.id')
        ->join('customers','payments.customers_id','=','customers.id')
        ->join('staff','payments.staff_id','=','staff.id');
    }

    public function rental(){
        $this->belongsTo(Rental::class);
    }

    public function customer(){
        $this->belongsTo(Customer::class);
    }

    public function staff(){
        $this->belongsTo(Staff::class);
    }
}
