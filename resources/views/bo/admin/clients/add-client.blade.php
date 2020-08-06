@extends('admin-layout')

@section('title', 'Ajout d\'un client')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Ajout d'un client</h2>

        <div class="mout-admin-container">
            @include('bo.forms._add_client')
        </div>
    </div>

@endsection
