<?php

namespace App\Services;

use App\Models\todo;
use Illuminate\Http\Request;

interface TodoService
{
    public function getAll();
    public function create(Request $request);
    public function edit(Todo $todo, Request $request);
    public function delete(Todo $todo);
}
