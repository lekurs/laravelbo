@extends('admin-layout')

@section('title', 'Ajout d\'un client')

@section('body')
    <h2 class="admin-title">Mise à jour de : {{$client->name}}</h2>

    <div class="mout-admin-container">
        <div class="mout-admin-double-container">
            <div class="left-container">
{{--                <h3 class="mout-bo-title-3-edit-page">Mettre à jour {{$client->name}}</h3>--}}
                <form action="{{route('updateClient', $client->slug)}}" name="editClient" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="float-label">Nom *</label>
                        <input type="text" class="form-control" name="name" value="{{$client->name}}">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="float-label">Téléphone</label>
                        <input type="text" class="form-control" name="phone" value="{{$client->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="address" class="float-label">Adresse</label>
                        <input type="text" class="form-control" name="address" value="{{$client->address}}">
                    </div>
                    <div class="form-group">
                        <label for="zip" class="float-label">Code postal</label>
                        <input type="number"  class="form-control" name="zip" value="{{$client->zip}}">
                    </div>
                    <div class="form-group">
                        <label for="city" class="float-label">Ville</label>
                        <input type="text" class="form-control" name="city" value="{{$client->city}}">
                    </div>
                    <div class="form-group">
                        <label for="siren" class="float-label">Siren</label>
                        <input type="number" class="form-control" name="siren" value="{{$client->siren}}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn mout-btn-add-button">Mettre à jour</button>
                        <button type="button" class="btn mout-btn-add-button btn-cancel">Annuler</button>
                    </div>
                </form>
            </div>

            <div class="right-container">
                <div class="right-content">
                    <h3 class="mout-bo-title-3-edit-page">Les contacts</h3>
                    <div class="mout-bo-contacts-container">
                        @foreach($client->contacts as $contact)
                            <p class="mout-bo-edit"><i class="fas fa-pen mout-bo-edit-icon"></i></p>
                            <p class="mout-contact-informations" data-slug="{{$contact->slug}}">{{$contact->name}} - {{$contact->lastname}} <span class="mout-contact-edit-information"><i class="fas fa-edit"></i></span>   </p>
                            <p class="mout-contact-informations">{{ $contact->phone }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

