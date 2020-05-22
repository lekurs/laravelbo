@extends('admin-layout')

@section('title', 'Devis {{$estimation->number}}')

@section('body')
    <h2 class="admin-title">Devis réf : {{$estimation->number}}</h2>

    <div class="mout-admin-container">
        <div class="mout-admin-left-panel">
            <img src="{{asset('images/bills/logo-mout-factures.png')}}" alt="MOUT" class="img-fluid">
            <div class="mout-admin-estimation-container">
                <div class="mout-estimation-header-container">
                    <H3 id="mout-estimation-number">DEVIS réf : <span class="mout-estimation-number">{{$estimation->number}}</span></H3>
                    <p id="mout-estimation-date">Fait à le Chesnay, le {{$estimation->created_at->format('d/m/Y')}}</p>
                </div>
                <h4 class="mout-estimation-client-name">{{$estimation->client->name}}</h4>
                <p class="mout-estimation-contact-informations">{{$estimation->contact->name}} {{$estimation->contact->lastname}} </p>
                <p class="mout-estimation-contact-informations">{{$estimation->client->address}}</p>
                <p class="mout-estimation-contact-informations">{{$estimation->client->zip}} {{$estimation->client->city}}</p>
                <p class="mout-estimation-contact-informations">{{$estimation->contact->email}}</p>
            </div>

            <div class="mout-estimation-description">
                <h4 class="mout-estimation-description-title">Description</h4>
                <p class="mout-estimation-description-body">
                    {{$estimation->body}}
                </p>
                <p id="mout-estimation-blank">&nbsp;</p>
            </div>

            <div class="mout-estimation-footer-container">
                <p id="mout-estimation-payment">Condition de paiement : à la réception de la facture</p>

                <div class="mout-estimation-bill-container">
                    <div class="mout-estimation-bill-content-details">
                        <p class="bill">Total HT</p>
                        <p class="bill">TVA</p>
                        <p class="bill">Total TTC</p>
                    </div>
                    <div class="mout-estimation-bill-content-price">
                        <p class="bill">{{number_format($estimation->price, 2)}} €</p>
                        <p class="bill">{{number_format($estimation->price * .2, 2) }} €</p>
                        <p class="bill">{{number_format(($estimation->price * 1.2), 2)}} €</p>
                    </div>
                </div>
            </div>
            <a href="{{route('createPDFEstimation', $estimation->id)}}" class="btn btn-dark btn-mout">Enregistrer en pdf</a>
        </div>
        <div class="mout-admin-right-panel"></div>
    </div>

@endsection
