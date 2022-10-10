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
    <h1>{{$todo->title}}</h1>
    <img src="storage/{{$todo->image}}" alt="image" style="max-width: 450px">
    <p>{{$todo->description}}</p>
    <a href="{{route('edit', ['todo'=>$todo->id])}}">Редактировать</a>
    <a href="{{route('delete', ['todo'=>$todo->id])}}">Удалить</a>
</div>
</body>
</html>

