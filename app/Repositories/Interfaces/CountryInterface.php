<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CountryRequest;

interface CountryInterface {
    public function getAll();
    public function create(CountryRequest $request);
    public function getone(string $id);
    public function update(CountryRequest $request,string $id);
    public function delete(string $id);
}