<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\LanguageRequest;

interface LanguageInterface {
    public function getAll();
    public function create(LanguageRequest $request);
    public function getone(string $id);
    public function update(LanguageRequest $request,string $id);
    public function delete(string $id);
}