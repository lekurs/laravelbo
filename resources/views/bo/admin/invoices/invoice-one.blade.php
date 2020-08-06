@extends('admin-layout')

@section('title', 'Devis '. $invoice->number )

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Facture réf : {{$invoice->number}}</h2>

        <div class="mout-admin-container">
            <div class="mout-admin-left-panel">
                <img src="{{asset('images/bills/logo-mout-factures.png')}}" alt="MOUT" class="img-fluid">
                <div class="mout-admin-estimation-container">
                    <div class="mout-estimation-header-container">
                        <H3 id="mout-estimation-number">Facture réf : <span class="mout-estimation-number">{{$invoice->number}}</span></H3>
                        <p id="mout-estimation-date">Fait à le Chesnay, le {{$invoice->created_at->format('d/m/Y')}}</p>
                    </div>
                    <h4 class="mout-estimation-client-name">{{$invoice->estimations->first()->client->name}}</h4>
                    <p class="mout-estimation-contact-informations">{{$invoice->estimations->first()->contact->name}} {{$invoice->estimations->first()->contact->lastname}} </p>
                    <p class="mout-estimation-contact-informations">{{$invoice->estimations->first()->client->address}}</p>
                    <p class="mout-estimation-contact-informations">{{$invoice->estimations->first()->client->zip}} {{$invoice->estimations->first()->client->city}}</p>
                    <p class="mout-estimation-contact-informations">{{$invoice->estimations->first()->contact->email}}</p>
                </div>

                <div class="mout-estimation-description">
                    <h4 class="mout-estimation-description-title">Description</h4>
                    <p class="mout-estimation-description-body">
                        {!! $invoice->estimations->first()->body !!}
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
                            <p class="bill">{{number_format($invoice->amount, 2)}} €</p>
                            <p class="bill">{{number_format($invoice->amount * .2, 2) }} €</p>
                            <p class="bill">{{number_format(($invoice->amount * 1.2), 2)}} €</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mout-admin-right-panel">
                <h3 class="mout-admin-title">Actions</h3>
                <div id="estimation-action-1">
                    <a href="{{route('createPDFInvoice', $invoice->id)}}" target="_blank" class="btn btn-labeled mout-btn-pdf">
                        <span class="btn-label"><i class="fal fa-chevron-right"></i></span>Voir le pdf</a>
                </div>
                <div id="estimation-action-2">
                    <a href="{{route('editInvoie', $invoice->id)}}" class="btn btn-labeled mout-btn-edit">
                        <span class="btn-label"><i class="fal fa-chevron-right"></i></span>Modifier la facture</a>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('js/admin/bo-mout-valide-estimation.js')}}"></script>
@endsection
