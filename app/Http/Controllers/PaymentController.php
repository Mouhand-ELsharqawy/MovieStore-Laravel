<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Repositories\Interfaces\PaymentInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    use GeneralTrait;

    private PaymentInterface $repo;

    public function __construct(PaymentInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->repo->getAll();
            return $this->getData('Payments',$data);
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
    public function store(PaymentRequest $request)
    {
        try{
            $data = $this->repo->create($request);
            return $this->getData('Payment',$data);
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
            $data = $this->repo->getone($id);
            return $this->getData('Payment',$data);
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
    public function update(PaymentRequest $request, string $id)
    {
        try{
            $data = $this->repo->update($request,$id);
            return $this->getData('Payment',$data);
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
            $this->repo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
