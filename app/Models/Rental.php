<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rental extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'staff_id', 'customers_id', 'inventories_id', 'rentaldate', 'returndate'];

    public function scopeJoininventorycustomerstaff(Builder $builder){
        $builder->join('staff','rentals.staff_id','=','staff.id')
        ->join('customers','rentals.customers_id','=','customers.id')
        ->join('inventories','rentals.inventories_id','=','inventories.id');
    }

    public function customer(){
        $this->belongsTo(Customer::class);
    }

    public function staff(){
        $this->belongsTo(Staff::class);
    }

    public function inventory(){
        $this->belongsTo(Inventory::class);
    }
    
    public function payment(){
        $this->hasMany(Payment::class);
    }    
}
