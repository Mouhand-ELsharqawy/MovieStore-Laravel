<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Repositories\Interfaces\FilmInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    use GeneralTrait;

    private FilmInterface $filmrepo;

    public function __construct(FilmInterface $filmrepo)
    {
        $this->filmrepo = $filmrepo;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->filmrepo->getAll();
            return $this->getData('Films',$data);

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
    public function store(FilmRequest $request)
    {
        try{

            $data = $this->filmrepo->create($request);
            return $this->getData('Film',$data);

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

            $data = $this->filmrepo->getone($id);
            return $this->getData('Film',$data);

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
    public function update(FilmRequest $request, string $id)
    {
        try{

            $data = $this->filmrepo->update($request,$id);
            return $this->getData('Film',$data);

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

            $this->filmrepo->delete($id);
            return $this->deleteData();

        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
