<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilmActor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'films_id', 'actors_id'];

    public function scopeJoinfilmactor(Builder $builder){
        $builder->join('films','film_actors.films_id','=','films.id')
        ->join('actors','film_actors.actors_id','=','actors.id');
    }

    public function film(){
        $this->belongsTo(Film::class);
    }

    public function actor(){
        $this->belongsTo(Actor::class);
    }
}
