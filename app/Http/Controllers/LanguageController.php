<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Repositories\Interfaces\LanguageInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    use GeneralTrait;

    private LanguageInterface $langrepo;

    public function __construct(LanguageInterface $langrepo)
    {
        $this->langrepo = $langrepo;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->langrepo->getAll();
            return $this->getData('Language', $data);

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
    public function store(LanguageRequest $request)
    {
        try{

            $data = $this->langrepo->create($request);
            return $this->getData('Language', $data);
            
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

            $data = $this->langrepo->getone($id);
            return $this->getData('Language', $data);
            
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
    public function update(LanguageRequest $request, string $id)
    {
        try{

            $data = $this->langrepo->update($request,$id);
            return $this->getData('Language', $data);
            
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

            $this->langrepo->delete($id);
            return $this->deleteData();
            
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
