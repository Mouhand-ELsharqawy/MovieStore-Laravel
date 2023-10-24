<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\InventoryRequest;

interface InventoryInterface {
    public function getAll();
    public function create(InventoryRequest $request);
    public function getone(string $id);
    public function update(InventoryRequest $request,string $id);
    public function delete(string $id);
}