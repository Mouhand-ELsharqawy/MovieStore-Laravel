<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\InventoryRequest;
use App\Models\Film;
use App\Models\Inventory;
use App\Repositories\Interfaces\InventoryInterface;

class InventoryRepository implements InventoryInterface {
    public function getAll()
    {
        $invens = Inventory::joinfilms()
        ->select('films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext')
        ->painate(6);

        return $invens;
    }

    public function create(InventoryRequest $request)
    {
        $filmid = Film::where('films.title',$request->film)->value('id');
        $inven = Inventory::create([
            'films_id' => $filmid
        ]);

        return $inven;
    }

    public function getone(string $id)
    {
        $inven = Inventory::joinfilms()
        ->where('inventories.id',$id)
        ->get(['films.title', 'films.desc', 'films.releaseyear', 'films.rentalduration', 
        'films.rentalrate', 'films.length', 'films.replacementcost', 'films.rating', 
        'films.specialfeature', 'films.fulltext']);

        return $inven;
    }

    public function update(InventoryRequest $request, string $id)
    {
        $filmid = Film::where('films.title',$request->film)->value('id');
        $inven = Inventory::find($id);
            $inven->films_id = $filmid;
            $inven->update();

        return $inven;
    }

    public function delete(string $id)
    {
        $inven = Inventory::find($id);
        $inven->delete();
    }
}