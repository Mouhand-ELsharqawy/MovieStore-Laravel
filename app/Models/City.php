<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [ 'id', 'name', 'governorate', 'countries_id'];

    public function scopeJoincountry(Builder $builder){
        $builder->join('countries','cities.countries_id','=','countries.id');
    }

    public function address(){
        $this->hasMany(Address::class);
    }

    public function country(){
        $this->belongsTo(Country::class);
    }
}
