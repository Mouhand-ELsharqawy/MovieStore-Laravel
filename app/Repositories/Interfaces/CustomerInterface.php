<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CustomerRequest;

interface CustomerInterface {
    public function getAll();
    public function create(CustomerRequest $request);
    public function getone(string $id);
    public function update(CustomerRequest $request,string $id);
    public function delete(string $id);
}