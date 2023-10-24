<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ActorRequest;

interface ActorInterface {
    public function getAll();
    public function create(ActorRequest $request);
    public function getone(string $id);
    public function update(ActorRequest $request,string $id);
    public function delete(string $id);
}