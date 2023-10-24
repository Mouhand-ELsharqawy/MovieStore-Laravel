<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\CityRequest;

interface CityInterface {
    public function getAll();
    public function create(CityRequest $request);
    public function getone(string $id);
    public function update(CityRequest $request,string $id);
    public function delete(string $id);
}