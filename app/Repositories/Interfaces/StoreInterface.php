<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\StoreRequest;

interface StoreInterface {
    public function getAll();
    public function create(StoreRequest $request);
    public function getone(string $id);
    public function update(StoreRequest $request,string $id);
    public function delete(string $id);
}