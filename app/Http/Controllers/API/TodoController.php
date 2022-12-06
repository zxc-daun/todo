<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService){
        $this->todoService = $todoService;
    }

    public function index(){
        try{
            $todos = $this->todoService->getAll();

            return response()->json([
                'status'=>true,
                'todos'=>TodoResource::collection($todos)
            ]);
        } catch(\Exception $e){

            return response()->json([
                'status'=>false,
                'message'=>$e->getMessege()
            ], $e->getCode());
        }
    }
    public function create(Request $request)
    {
        $todos = $this->todoService->create($request);
        return response()->json([
            'status' => true,
            'message' => $todos
        ]);
    }
}
