<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Repositories\Interfaces\StoreInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    use GeneralTrait;

    private StoreInterface $storerepo;

    public function __construct(StoreInterface $storerepo)
    {
        $this->storerepo = $storerepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->storerepo->getAll();
            return $this->getData('Stores',$data);

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
    public function store(StoreRequest $request)
    {
        try{

            $data = $this->storerepo->create($request);
            return $this->getData('Store',$data);

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

            $data = $this->storerepo->getone($id);
            return $this->getData('Store',$data);

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
    public function update(StoreRequest $request, string $id)
    {
        try{
            
            $data = $this->storerepo->update($request,$id);
            return $this->getData('Store',$data);

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
            $this->storerepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
