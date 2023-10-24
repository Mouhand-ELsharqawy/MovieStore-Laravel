<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentalRequest;
use App\Repositories\Interfaces\RentalInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class RentalController extends Controller
{

    use GeneralTrait;

    private RentalInterface $rentalrepo;

    public function __construct(RentalInterface $rentalrepo)
    {
        $this->rentalrepo = $rentalrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->rentalrepo->getAll();
            return $this->getData('Rentals',$data);
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
    public function store(RentalRequest $request)
    {
        try{
            $data = $this->rentalrepo->create($request);
            return $this->getData('Rental',$data);
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
            $data = $this->rentalrepo->getone($id);
            return $this->getData('Rental',$data);
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
    public function update(RentalRequest $request, string $id)
    {
        try{
            $data = $this->rentalrepo->update($request,$id);
            return $this->getData('Rental',$data);
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
            $this->rentalrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
