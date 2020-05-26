@extends('admin-layout')

@section('title', 'Réalisation d\'une facture')

@section('body')
    <h2 class="admin-title">Créer une facture</h2>
    <div class="mout-estimation-container">
        @include('bo.forms._add_invoice')
    </div>

@endsection
