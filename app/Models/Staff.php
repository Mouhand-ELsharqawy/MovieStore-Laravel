<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['id', 'addresses_id', 'stores_id', 'firstname', 'lastname', 'username', 'email', 'pictureurl', 'active'];

    // accessor
    public function getActiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setActiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['active'] = $activeVal;
    }

    public function scopeJoinaddressstore(Builder $builder){
        $builder->join('addresses','staff.addresses_id','=','addresses.id')
        ->join('stores','staff.stores_id','=','stores.id');
    }

    public function address(){
        $this->belongsTo(Address::class);
    }

    public function store(){
        $this->belongsTo(Store::class);
    }

    public function payment(){
        $this->hasMany(Payment::class);
    }

    public function rental(){
        $this->hasMany(Rental::class);
    }
}
