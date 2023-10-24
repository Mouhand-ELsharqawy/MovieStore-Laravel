<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\StaffRequest;

interface StaffInterface {
    public function getAll();
    public function create(StaffRequest $request);
    public function getone(string $id);
    public function update(StaffRequest $request,string $id);
    public function delete(string $id);
}