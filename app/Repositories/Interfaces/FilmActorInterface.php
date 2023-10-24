<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\FilmActorRequest;

interface FilmActorInterface {
    public function getAll();
    public function create(FilmActorRequest $request);
    public function getone(string $id);
    public function update(FilmActorRequest $request,string $id);
    public function delete(string $id);   
}