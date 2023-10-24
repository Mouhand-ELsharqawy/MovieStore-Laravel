<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryRequest;
use App\Repositories\Interfaces\CountryInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    use GeneralTrait;

    private CountryInterface $countryrepo;

    public function __construct(CountryInterface $countryrepo)
    {
        $this->countryrepo = $countryrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->countryrepo->getAll();
            return $this->getData('Countries', $data);
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
    public function store(CountryRequest $request)
    {
        try{

            $data = $this->countryrepo->create($request);
            return $this->getData('Country',$data);

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

            $data = $this->countryrepo->getone($id);
            return $this->getData('Country',$data);

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
    public function update(CountryRequest $request, string $id)
    {
        try{

            $data = $this->countryrepo->update($request,$id);
            return $this->getData('Country',$data);

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
            $this->countryrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
