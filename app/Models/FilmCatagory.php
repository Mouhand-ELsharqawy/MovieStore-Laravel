<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmCatagory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'films_id', 'catagories_id'];

    public function scopeJoinfilmcatagory(Builder $builder){
        $builder->join('films','film_catagories.films_id','=','films.id')
        ->join('actors','film_catagories.catagories_id','=','catagories.id');
    }

    public function film(){
        $this->belongsTo(Film::class);
    }

    public function catagory(){
        $this->belongsTo(catagory::class);
    }
}
