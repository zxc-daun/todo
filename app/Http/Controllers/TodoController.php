<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = todo::with('category')->get();
        return view('todos', [
            'todos'=>$todos
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('create-todos', [
            'categories'=>$categories
        ]);
    }
    public function store(Request $request){
        if($request->hasFile('image')){
            $todo = new Todo();
            $todo->title = $request->get('title');
            $todo->description = $request->get('description');
            $todo->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $todo->image = $url;

            $todo->save();

        }
        return redirect('/')->with('status', 'Данные успешно сохранены');
    }

    public function todo(Todo $todo){
        return view('todo', [
            'todo'=>$todo
        ]);
    }

    public function edit(Todo $todo){
        $categories = Category::all();
        return view('edit-todo', [
            'todo'=>$todo,
            'categories' => $categories
        ]);
    }

    public function editSave( Todo $todo, Request $request){
        if($request->hasFile('image')){
            $todo->title = $request->get('title');
            $todo->description = $request->get('description');
            $todo->category_id = $request->get('category_id');
            $url = $request->file('image')->store('images');
            $todo->image = $url;

            $todo->save();
            return redirect('/')->with('status', 'Данные успешно сохранены');
        }
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        return redirect('/')->with('status', 'Данные успешно удалены');
    }
}
