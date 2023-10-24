<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use App\Repositories\Interfaces\StoreInterface;

class StoreRepository implements StoreInterface {

    public function getAll()
    {
        $stores = Store::paginate(6);
        return $stores;    
    }

    public function create(StoreRequest $request)
    {
        $store = Store::create([
            'name' => $request->store, 
            'managerfirstname' => $request->managerfirstname, 
            'managerlastname' => $request->managerlastname, 
            'managerphone' => $request->managerphone, 
            'type' => $request->type, 
            'active' => $request->active
        ]);

        return $store;
    }

    public function getone(string $id)
    {
        $store = Store::find($id);
        return $store;
    }

    public function update(StoreRequest $request, string $id)
    {
        $store = Store::find($id);

        $store-> name = $request->store;
        $store->managerfirstname = $request->managerfirstname;
        $store->managerlastname = $request->managerlastname;
        $store->managerphone = $request->managerphone;
        $store->type = $request->type;
        $store->active = $request->active;

        $store->update();
        return $store;
    }

    public function delete(string $id)
    {
        $store = Store::find($id);
        $store->delete();
    }
}