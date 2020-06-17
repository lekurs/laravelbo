@extends('admin-layout')

@section('title', 'Ajout d\'un client')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Mise à jour de la facture : {{$invoice->number}}</h2>

        <div class="mout-admin-container">
                @include('bo.forms._edit_invoice')
            </div>
        </div>
@endsection

