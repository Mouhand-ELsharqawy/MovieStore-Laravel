<?php

namespace App\Models;

use App\Models\Scopes\CustomerActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'firstname', 'lastname', 'address', 'email', 'phonenumber', 'telephone', 'active'];


    // accessor
    public function getActiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setActiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['active'] = $activeVal;
    }

    protected static function booted()
    {
        static::addGlobalScope(new CustomerActiveScope);
    }

    public function payment(){
        $this->hasMany(Payment::class);
    }

    public function rental(){
        $this->hasMany(Rental::class);
    }
}
