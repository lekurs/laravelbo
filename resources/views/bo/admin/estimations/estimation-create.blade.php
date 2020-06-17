@extends('admin-layout')

@section('title', 'Réalisation d\'un devis')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer un devis</h2>
        <div class="mout-estimation-container">
            @include('bo.forms._add_estimation')
        </div>
    </div>

@endsection
