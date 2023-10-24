<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'films_id'];

    public function scopeJoinfilm(Builder $builder){
        $builder->join('films','inventories.films_id','=','films.id');
    }

    public function film(){
        $this->belongsTo(Film::class);
    }

    public function rental(){
        $this->hasMany(Rental::class);
    }
}
