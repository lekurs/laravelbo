@extends('admin-layout')

@section('title', 'Devis '. $estimation->number )

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
                    {!! $estimation->body !!}
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
        </div>
        <div class="mout-admin-right-panel">
            <h3 class="mout-admin-title">Actions</h3>
            <div class="mout-admin-estimation-right-panel">
            <p>Devis validé ?</p>
            <label class="switch">
                <input type="checkbox" class="update-estim" @if($estimation->validation == 1) checked @endif>
                <span class="slider round" data-id="{{$estimation->id}}"></span>
            </label>
            </div>
            <div id="estimation-action-2">
                <a href="{{route('createPDFEstimation', $estimation->id)}}" target="_blank" class="btn btn-dark btn-mout">Voir le pdf</a>
            </div>
            <div id="estimation-action-3" @if($estimation->validation === 1) class="estimation-action-active" @endif>
                <a href="{{route('createDownPaiementInvoice', $estimation->id)}}" class="btn btn-mout btn-dark">Créer une facture d'acompte</a>
                <a href="{{route('createInvoice', $estimation->id)}}" class="btn btn-mout btn-dark">Créer la facture</a>
            </div>
            @if(!is_null($estimation->invoices))
            <div id="estimation-action-4">
                <a href="#" class="btn btn-mout btn-dark">Voir la facture</a>
            </div>
            @endif

        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('js/admin/bo-mout-valide-estimation.js')}}"></script>
@endsection
