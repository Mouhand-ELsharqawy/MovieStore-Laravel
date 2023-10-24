<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\FilmCatagoryRequest;
use App\Models\Catagory;
use App\Models\Film;
use App\Models\FilmCatagory;
use App\Repositories\Interfaces\FilmCatagoryInterface;

class FilmCatagoryRepository implements FilmCatagoryInterface {
    public function getAll()
    {
        $filmcatagories= FilmCatagory::joinfilmcatagory()
        ->select('films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext', 'catagories.name')
        ->paginate(6);

        return $filmcatagories;
    }

    public function create(FilmCatagoryRequest $request)
    {
        $filmid = Film::where('films.title', $request->film)->value('id');
        $catagoryid = Catagory::where('catagories.name', $request->name)->value('id');

        $filmcatagory = FilmCatagory::create([
            'films_id' => $filmid,
            'catagories_id' => $catagoryid
        ]);

        return $filmcatagory;
    }

    public function getone(string $id)
    {
        $filmcatagory= FilmCatagory::joinfilmcatagory()
        ->where('film_catagories',$id)
        ->get(['films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext', 'catagories.name']);

        return $filmcatagory;
    }

    public function update(FilmCatagoryRequest $request, string $id)
    {
        $filmcatagory = FilmCatagory::find($id);

        $filmid = Film::where('films.title', $request->film)->value('id');
        $catagoryid = Catagory::where('catagories.name', $request->name)->value('id');

        
        $filmcatagory->films_id = $filmid;
        $filmcatagory->catagories_id = $catagoryid;
        $filmcatagory->update();

        return $filmcatagory;

    }

    public function delete(string $id)
    {
        $filmcatagory = FilmCatagory::find($id);
        $filmcatagory->delete();
    }
}