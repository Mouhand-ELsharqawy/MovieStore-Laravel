<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\FilmCatagoryRequest;

interface FilmCatagoryInterface {
    public function getAll();
    public function create(FilmCatagoryRequest $request);
    public function getone(string $id);
    public function update(FilmCatagoryRequest $request,string $id);
    public function delete(string $id);
}