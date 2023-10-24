<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Repositories\Interfaces\AddressInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class AddressController extends Controller
{

    use GeneralTrait;

    private AddressInterface $addressrepo;

    public function __construct(AddressInterface $addressrepo)
    {
        $this->addressrepo = $addressrepo;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->addressrepo->getAll();
            return $this->getData('Addresses',$data);
        }  catch(Exception $e){
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
    public function store(AddressRequest $request)
    {
        try{
            $data = $this->addressrepo->create($request);
            return $this->getData('Address',$data);
        }  catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $data = $this->addressrepo->getone($id);
            return $this->getData('Address',$data);
        }  catch(Exception $e){
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
    public function update(AddressRequest $request, string $id)
    {
        try{
            $data = $this->addressrepo->update($request,$id);
            return $this->getData('Address',$data);
        }  catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->addressrepo->delete($id);
            return $this->deleteData();
        }  catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        } 
    }
}
