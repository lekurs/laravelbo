<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Laravel</title>

</head>

<body>
<div class="container mt-3">
    <h2>{{ $name }}</h2>

    <p>Mon premier formulaire</p>
    <form action="{{route('editcontroller', $nav->id)}}" method="post" name="myform">
        @csrf
        <div class="input-group">
            <input type="text" class="" name="title" id="title" value="@isset($nav->title){{$nav->title}} @endisset" />
        </div>
        <div class="input-group">
            <textarea name="body">@isset($nav->body) {{$nav->body}} @endisset</textarea>
        </div>
        <div class="input-group">
            <button class="btn btn-dark">Envoyer</button>
        </div>
    </form>
</div>
</body>
</html>
