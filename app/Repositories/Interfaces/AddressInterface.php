<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\AddressRequest;

interface AddressInterface {
    public function getAll();
    public function create(AddressRequest $request);
    public function getone(string $id);
    public function update(AddressRequest $request,string $id);
    public function delete(string $id);
}