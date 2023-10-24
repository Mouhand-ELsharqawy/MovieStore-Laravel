<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RentalRequest;

interface RentalInterface {
    public function getAll();
    public function create(RentalRequest $request);
    public function getone(string $id);
    public function update(RentalRequest $request,string $id);
    public function delete(string $id);
}