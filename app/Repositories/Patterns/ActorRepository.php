<?php 

namespace App\Repositories\Patterns;

use App\Http\Requests\ActorRequest;
use App\Models\Actor;
use App\Repositories\Interfaces\ActorInterface;

class ActorRepository implements ActorInterface {
    
    public function getAll()
    {
        $actors = Actor::paginate(6);
        return $actors;
    }

    public function create(ActorRequest $request)
    {
        $actor = Actor::create([
            'firstname' => $request->firstname, 
            'lastname' => $request->lastname, 
            'agentname' => $request->agentname, 
            'actorphonenumber' => $request->actorphonenumber, 
            'actortelephone' => $request->actortelephone, 
            'gmail' => $request->gmail, 
            'active' => $request->active
        ]);

        return $actor;
    }

    public function getone(string $id)
    {
        $actor = Actor::find($id);
        return $actor;
    }

    public function update(ActorRequest $request, string $id)
    {
        $actor = Actor::find($id);

        $actor->firstname = $request->firstname; 
        $actor->lastname = $request->lastname;
        $actor->agentname = $request->agentname; 
        $actor->actorphonenumber = $request->actorphonenumber; 
        $actor->actortelephone = $request->actortelephone;
        $actor->gmail = $request->gmail;
        $actor->active = $request->active;
        $actor->update();

        return $actor;
    }

    public function delete(string $id)
    {
        $actor = Actor::find($id);
        $actor->delete();
    }
}