<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Repositories\Interfaces\ActorInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class ActorController extends Controller
{

    use GeneralTrait;


    private ActorInterface $actorrepo;

    public function __construct(ActorInterface $actorrepo)
    {
        $this->actorrepo = $actorrepo;
    }

    /**
     * Display a listing of the resource.
     */

    
    public function index()
    {
        try{
            $data = $this->actorrepo->getAll();
            return $this->getData('actors',$data);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ActorRequest $request)
    {
        try{
            $data = $this->actorrepo->create($request);
            return $this->getData('actor',$data);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $data = $this->actorrepo->getone($id);
            return $this->getData('actor',$data);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ActorRequest $request, string $id)
    {
        try{
            $data = $this->actorrepo->update($request,$id);
            return $this->getData('actor',$data);
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->actorrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
