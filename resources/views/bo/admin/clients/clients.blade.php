@extends('admin-layout')

@section('title', 'Nos clients')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Nos clients</h2>

        <div class="mout-create-navigation-container">
            <a href="{{route('addClient')}}" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </a>
        </div>

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
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="9" class="mout-bo-table-header-padding">&nbsp;</td>
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
                            <td data-slug="{{$client->id}}">
                                <a href="{{route('showOne', $client->slug)}}"><i class="fas fa-eye"></i></a>
                                <a href="{{route('editOne', $client->slug)}}"><i class="fas fa-edit edit-ico"></i></a>
                                <a href="{{route('deleteClient', $client->slug)}}"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><a href="{{route('showEstimations', $client->id)}}"><i class="fas fa-plus add-estimation-ico"></i></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>pas de client</td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="bo-mout-pagination">
                {{$clients->links()}}
            </div>
        </div>
    </div>
@endsection
