<?php

namespace App\Services\Impl;

use App\Models\todo;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoServiceImpl implements TodoService
{
    public function getAll()
    {
        $todos = Todo::all();

        if(count($todos) == 0){
            throw new \Exception('Нет данных!', 404);
        }
        return $todos;
    }

    public function create(Request $request){
        if($request->hasFile('image')){
            $todo = new Todo();
            $todo->title = $request->get('title');
            $todo->description = $request->get('description');
            $todo->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $todo->image = $url;

            $todo->save();

        }
        return 'Успешно!';
    }

    public function edit(Todo $todo,Request $request){
        if($request->hasFile('image'))
        {
            $todo->title = $request->get('title');
            $todo->description = $request->get('description');
            $todo->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $todo->image = $url;

            $todo->save();
        }
        return 'Успешно!';
    }

    public function delete(Todo $todo){

            $todo->delete();
        return 'Успешно!';
}
}


