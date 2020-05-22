@extends('admin-layout')

@section('title', 'client {{$client->name}}')

@section('body')
    <div class="mout-client-card-container">
        <div class="mout-client-card-left-content">
            <h3 class="mout-title-client-card">Fiche Client</h3>
            <h4 class="mout-title-client-name">{{$client->name}}</h4>

            @forelse($client->contacts as $contact)
            <p class="mout-client-card-info-bolder"><span><i class="far fa-smile contact-icon contact-smiley"></i></span>{{$contact->name}}</p>
            <p><span><i class="far fa-envelope contact-icon contact-envelope"></i></span>{{$contact->email}}</p>
            <p class="mout-client-card-info-bolder"><span><i class="fas fa-phone contact-icon contact-phone"></i></span>{{$contact->phone}}</p>
            <p><span><i class="fas fa-map-marker-alt contact-icon contact-marker"></i></span>{{$client->address}}</p>
            <p class="mout-client-card-city-informations">{{$client->zip}} {{$client->city}} </p>
            <p class="mout-client-card-info-bolder"><span><i class="fas fa-map-marker-alt contact-icon contact-marker"></i></span>{{$client->siren}}</p>
            @empty
            <p>pas de contact</p>
            @endforelse
        </div>
        <div class="mout-client-card-right-content">
            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-created-at"><i class="far fa-calendar-alt"></i></p>
                <p class="mout-client-card-title">Date de création</p>
                <p>{{$client->created_at->format('d/m/Y')}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-ca"><i class="far fa-calendar-alt"></i></p>
                <p class="mout-client-card-title">Ca {{date('M')}}</p>
                <p>{{$client->created_at->format('d/m/Y')}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-estimations"><i class="far far fa-file"></i></p>
                <p class="mout-client-card-title">Devis</p>
                <p>{{$client->created_at->format('d/m/Y')}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-bills"><i class="fas fa-file-invoice-dollar"></i></p>
                <p class="mout-client-card-title">Factures</p>
                <p>{{$client->created_at->format('d/m/Y')}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-total-ca"><i class="fas fa-euro-sign"></i></p>
                <p class="mout-client-card-title">Total CA <br>
                    <span class="mout-client-card-total-ca-span">{{$client->created_at->format('d/m/Y')}}</span>
                </p>
            </div>
        </div>
    </div>

    <div class="mout-estimations-container">
        <table class="table-striped table-hover mout-bo-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Intitulé</th>
                <th>Prix</th>
                <th>Date</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($client->estimationsByOrder as $estimation)
            <tr>
                <td>{{$estimation->number}}</td>
                <td><a href="{{route('showOneEstimation', $estimation->id)}}" >{{$estimation->title}}</a></td>
                <td>{{$estimation->price}}</td>
                <td>{{$estimation->created_at->format('d/m/Y')}}</td>
                <td><i class="fas fa-circle @if($estimation->validation === 1) green-circle @else red-circle @endif"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
