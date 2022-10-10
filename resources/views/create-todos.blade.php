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
    <form action="{{route('store')}}" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column">
        @csrf
        <input type="text" placeholder="Введите название задания" name="title">
        <textarea placeholder="Введите описание задания" name="description"></textarea>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    <input type="file" placeholder="Выберите картинку" name="image">
        <input type="submit" placeholder="Подтвердить">
    </form>
</div>

</body>
</html>

