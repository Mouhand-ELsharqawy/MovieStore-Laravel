<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use App\Models\Language;
use App\Repositories\Interfaces\FilmInterface;

class FilmRepository implements FilmInterface {
    public function getAll()
    {
        $films = Film::joinfilm()
        ->select('films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext')
        ->paginate(6);

        return $films;
    }

    public function create(FilmRequest $request)
    {

        $language = Language::where('languages.name',$request->language)->value('id');

        $film = Film::create([
            'languages_id' => $language, 
            'title' => $request->title, 
            'desc' => $request->desc, 
            'releaseyear' => $request->releaseyear, 
            'rentalduration' => $request->rentalduration, 
            'rentalrate' => $request->rentalrate, 
            'length' => $request->length, 
            'replacementcost' => $request->replacementcost, 
            'rating' => $request->rating,
            'specialfeature' => $request->specialfeature, 
            'fulltext' => $request->fulltext
        ]);

        return $film;
    }

    public function getone(string $id)
    {
        $film = Film::joinfilm()
        ->where('films.id',$id)
        ->get(['films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext']);
        
        return $film;
    }

    public function update(FilmRequest $request, string $id)
    {
         $language = Language::where('languages.name',$request->language)->value('id');
        
        $film = Film::find($id);
            $film-> languages_id = $language; 
            $film-> title = $request->title;
            $film-> desc = $request->desc;
            $film->releaseyear = $request->releaseyear;
            $film->rentalduration = $request->rentalduration; 
            $film->rentalrate = $request->rentalrate;
            $film->length = $request->length;
            $film->replacementcost = $request->replacementcost; 
            $film->rating = $request->rating;
            $film->specialfeature = $request->specialfeature;
            $film->fulltext = $request->fulltext;
        $film->update();

        return $film;
    }

    public function delete(string $id)
    {
        $film = Film::find($id);
        $film->delete();
    } 

}