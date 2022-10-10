<!DOCTYPE html>
<html lang="{{ str_ireplace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
    @if(session('status'))
        {{session('status')}}
    @endif
    @if(\Illuminate\Support\Facades\Auth::user())
        {{\Illuminate\Support\Facades\Auth::user()->email}}
        <a href="{{route('logout')}}">Выйти</a>
        @else
            <a href="{{route('register')}}">Регистрация</a>
            <a href="{{route('auth')}}">Авторизация</a>
        @endif
    <a href="{{route('create')}}">Создать</a>
    <div class="cards">
        @foreach($todos as $todo)
        <div class="card">
            <h3><a href="{{route('todo', ['todo'=>$todo->id])}}">{{$todo->title}}</a> </h3>
            <img src="storage/{{$todo->image}}" alt="image" style="max-width: 300px">
            <br>
            <span>{{$todo->category->name}}</span>
        </div>
        @endforeach
    </div>
</div>
</body>
</html>
