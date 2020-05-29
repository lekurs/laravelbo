@extends('admin-layout')

@section('title', 'Réalisation d\'une facture d\'acompte')

@section('body')
    <h2 class="admin-title">Créer une facture d'acompte</h2>
    <div class="mout-estimation-container">
        @include('bo.forms._add_down_invoice')
    </div>

@endsection
