<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\FilmActorRequest;
use App\Models\Actor;
use App\Models\Film;
use App\Models\FilmActor;
use App\Repositories\Interfaces\FilmActorInterface;

class FilmActorRepository implements FilmActorInterface {
    public function getAll()
    {
        $filmactors = FilmActor::joinfilmactor()
        ->select('films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext', 'actors.firstname', 'actors.lastname')
        ->paginate(6);

        return $filmactors;
    }

    public function create(FilmActorRequest $request)
    {

        $filmid = Film::where('films.title',$request->film)->value('id');
        $actorid = Actor::where('actors.gmail',$request->film)->value('id');
        $filmactor = FilmActor::create([
            'films_id' => $filmid, 
            'actors_id' => $actorid
        ]);

        return $filmactor;
    }

    public function getone(string $id)
    {
        $filmactor = FilmActor::joinfilmactor()
        ->where('film_actors',$id)
        ->get(['films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext', 'actors.firstname', 'actors.lastname']);

        return $filmactor;
    }

    public function update(FilmActorRequest $request, string $id)
    {

        $filmid = Film::where('films.title',$request->film)->value('id');
        $actorid = Actor::where('actors.gmail',$request->film)->value('id');

        $filmactor = FilmActor::find($id);

        $filmactor->films_id = $filmid;
        $filmactor->actors_id = $actorid;

        $filmactor->update();
        return $filmactor;
    }

    public function delete(string $id)
    {
        $filmactor = FilmActor::find($id);
        $filmactor->delete();   
    }
}