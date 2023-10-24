<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatagoryRequest;
use App\Repositories\Interfaces\CatagoryInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{

    use GeneralTrait;

    private CatagoryInterface $catagoryrepo;

    public function __construct(CatagoryInterface $catagoryrepo)
    {
        $this->catagoryrepo = $catagoryrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->catagoryrepo->getAll();
            return $this->getData('Catagories',$data);

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
    public function store(CatagoryRequest $request)
    {
        try{
            $data = $this->catagoryrepo->create($request);
            return $this->getData('Catagory',$data);
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

            $data = $this->catagoryrepo->getone($id);
            return $this->getData('Catagory',$data);

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
    public function update(CatagoryRequest $request, string $id)
    {
        try{

            $data = $this->catagoryrepo->update($request,$id);
            $this->getData('Catagory',$data);

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
            $this->catagoryrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
