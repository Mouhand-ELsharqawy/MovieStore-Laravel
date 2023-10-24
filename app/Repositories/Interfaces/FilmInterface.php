<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\FilmRequest;

interface FilmInterface {
    public function getAll();
    public function create(FilmRequest $request);
    public function getone(string $id);
    public function update(FilmRequest $request,string $id);
    public function delete(string $id);
}