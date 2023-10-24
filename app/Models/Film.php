<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'languages_id', 'title', 'desc', 'releaseyear', 'rentalduration', 'rentalrate', 'length', 'replacementcost', 'rating', 'specialfeature', 'fulltext'];

    public function scopeJoinfilm(Builder $builder){
        $builder->join('languages','films.languages_id','=','languages.id');
    }

    public function language(){
        $this->belongsTo(Language::class);
    }

    public function filmactor(){
        $this->hasMany(FilmActor::class);
    }
    public function filmcatagory(){
        $this->hasMany(FilmCatagory::class);
    }

    public function inventory(){
        $this->hasMany(Inventory::class);
    }
}
