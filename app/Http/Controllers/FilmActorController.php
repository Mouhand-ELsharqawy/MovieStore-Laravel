<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmActorRequest;
use App\Repositories\Interfaces\FilmActorInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class FilmActorController extends Controller
{
    use GeneralTrait;

    private FilmActorInterface $filmactorrepo;

    public function __construct(FilmActorInterface $filmactorrepo)
    {
        try{

        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->filmactorrepo->getAll();
            return $this->getData('Film Actors',$data);

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
    public function store(FilmActorRequest $request)
    {
        try{
            $data = $this->filmactorrepo->create($request);
            return $this->getData('Film Actor',$data);
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
            $data = $this->filmactorrepo->getone($id);
            return $this->getData('Film Actor',$data);
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
    public function update(FilmActorRequest $request, string $id)
    {
        try{
            $data = $this->filmactorrepo->update($request,$id);
            return $this->getData('Film Actor',$data);
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
            $this->filmactorrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }  
    }
}
