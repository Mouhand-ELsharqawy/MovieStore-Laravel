<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CatagoryRequest;

interface CatagoryInterface {
    public function getAll();
    public function create(CatagoryRequest $request);
    public function getone(string $id);
    public function update(CatagoryRequest $request,string $id);
    public function delete(string $id);
}