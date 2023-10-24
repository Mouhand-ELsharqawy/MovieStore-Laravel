<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Repositories\Interfaces\CityInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{

    use GeneralTrait;

    private CityInterface $cityrepo;

    public function __construct(CityInterface $cityrepo)
    {
        $this->cityrepo = $cityrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->cityrepo->getAll();
            return $this->getData('Cities',$data);
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
    public function store(CityRequest $request)
    {
        try{
            $data = $this->cityrepo->create($request);
            return $this->getData('City',$data);
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

            $data = $this->cityrepo->getone($id);
            return $this->getData('City',$data);

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
    public function update(CityRequest $request, string $id)
    {
        try{

            $data = $this->cityrepo->update($request,$id);
            return $this->getData('City',$data);
            
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
            $this->cityrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
