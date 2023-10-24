<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PaymentRequest;

interface PaymentInterface {
    public function getAll();
    public function create(PaymentRequest $request);
    public function getone(string $id);
    public function update(PaymentRequest $request,string $id);
    public function delete(string $id);
}