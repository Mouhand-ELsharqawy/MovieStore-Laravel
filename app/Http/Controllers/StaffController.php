<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Repositories\Interfaces\StaffInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    use GeneralTrait;

    private StaffInterface $staffrepo;

    public function __construct(StaffInterface $staffrepo)
    {
        $this->staffrepo = $staffrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->staffrepo->getAll();
            return $this->getData('Staff',$data);
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
    public function store(StaffRequest $request)
    {
        try{

            $data = $this->staffrepo->create($request);
            return $this->getData('Staff',$data);

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
            $data = $this->staffrepo->getone($id);
            return $this->getData('Staff',$data);
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
    public function update(StaffRequest $request, string $id)
    {
        try{
            $data = $this->staffrepo->update($request,$id);
            return $this->getData('Staff',$data);
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
            $this->staffrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
