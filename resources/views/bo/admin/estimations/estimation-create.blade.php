@extends('admin-layout')

@section('title', 'Réalisation d\'un devis')

@section('body')
    <h2 class="admin-title">Créer un devis</h2>
    <div class="mout-estimation-container">
        @include('bo.forms._add_estimation')
    </div>

@endsection
