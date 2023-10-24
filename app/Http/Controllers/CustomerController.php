<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Repositories\Interfaces\CustomerInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use GeneralTrait;

    private CustomerInterface $customerrepo;

    public function __construct(CustomerInterface $customerrepo)
    {
        $this->customerrepo = $customerrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{

            $data = $this->customerrepo->getAll();
            return $this->getData('Customers',$data);

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
    public function store(CustomerRequest $request)
    {
        try{

            $data = $this->customerrepo->create($request);
            return $this->getData('Customer',$data);

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

            $data = $this->customerrepo->getone($id);
            return $this->getData('Customer',$data);

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
    public function update(CustomerRequest $request, string $id)
    {
        try{

            $data = $this->customerrepo->update($request,$id);
            return $this->getData('Customer',$data);

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
            $this->customerrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
