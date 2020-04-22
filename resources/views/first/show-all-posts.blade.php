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

    <table class="table-hover">
        <thead>
        <th>#</th>
        <th>Titre</th>
        <th>Body</th>
        <th>Edit</th>
        </thead>
        <tbody>
        @foreach($nav as $tab)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tab->title}}</td>
            <td>{{$tab->body}}</td>
            <td><a href="{{route('editcontroller', $tab->id)}}">Edit</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
