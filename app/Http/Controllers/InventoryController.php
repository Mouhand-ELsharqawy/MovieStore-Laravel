<?php

namespace App\Http\Controllers;

use App\Http\Requests\InventoryRequest;
use App\Repositories\Interfaces\InventoryInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    use GeneralTrait;


    private InventoryInterface $invenrepo;

    public function __construct(InventoryInterface $invenrepo)
    {
        $this->invenrepo = $invenrepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->invenrepo->getAll();
            return $this->getData('Inventories',$data);
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
    public function store(InventoryRequest $request)
    {
        try{

            $data = $this->invenrepo->create($request);
            return $this->getData('Inventory',$data);
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

            $data = $this->invenrepo->getone($id);
            return $this->getData('Inventory',$data);

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
    public function update(InventoryRequest $request, string $id)
    {
        try{

            $data = $this->invenrepo->update($request,$id);
            return $this->getData('Inventory',$data);

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
            $this->invenrepo->delete($id);
            return $this->deleteData();
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
