<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'name', 'managerfirstname', 'managerlastname', 'managerphone', 'type', 'active'];

    // accessor
    public function getActiveAttribute($val){
        return $val == true ? 'Active' : 'NotActive';
    }

    // mutator
    public function setActiveAttribute($val){
        $activeVal = $val == 'active' ? true:false ;
        $this->attributes['active'] = $activeVal;
    }


    public function staff(){
        $this->hasMany(Staff::class);
    }
}
