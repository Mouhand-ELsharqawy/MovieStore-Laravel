<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'cities_id', 'address2', 'district', 'street', 'building', 'googleearthlocation', 'phone', 'telephone', 'postalcode'];

    public function staff(){
        $this->hasMany(Staff::class);
    }

    public function scopeJoincity(Builder $builder){
        $builder->join('cities','addresses.cities_id','=','cities.id');
    }

    public function city(){
        $this->belongsTo(City::class);
    }
}
