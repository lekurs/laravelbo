@extends('admin-layout')

@section('title', 'Nos clients')

@section('body')
    <h2 class="admin-title">Nos clients</h2>

    <div class="mout-admin-container">
        <table class="table-striped table-hover mout-bo-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Siren</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Code postal</th>
                <th>Ville</th>
                <th><i class="fas fa-edit"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="6" class="mout-bo-table-header-padding">&nbsp;</td>
            </tr>

            @if($clients)
                @foreach($clients as $client)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->siren}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->address}}</td>
                        <td>{{$client->zip}}</td>
                        <td>{{$client->city}}</td>
<<<<<<< HEAD
                        <td data-slug="{{$client->slug}}"><i class="fas fa-edit"></i></td>
=======
                        <td data-slug="{{$client->slug}}"><a href="{{route('showOne', $client->slug)}}"><i class="fas fa-edit edit-ico"></i></a></td>
>>>>>>> b0e8e4965858cb3eeb6238b50634e9880f8e144c
                        <td data-slug="{{$client->slug}}"><a href="{{route('deleteClient', $client->slug)}}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>pas de client</td>
                </tr>
            @endif
            </tbody>
        </table>

        @include('bo.forms._add_client')
        @include('bo.forms._edit_client')
    </div>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.edit-ico').click(function (e) {
                e.preventDefault();
                $('.mout-edit-navigation-content').addClass('showNav');
            })
        })
    </script>
