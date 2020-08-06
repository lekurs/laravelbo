@extends('admin-layout')

@section('title', 'Nos réalisations' )

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Réalisations</h2>

    </div>

    <div class="mout-client-creation-buttons-container">
        <a href="{{route('projectCreation')}}" class="btn btn-mout mout-btn-add">
            <span class="btn-label"><i class="fal fa-chevron-right"></i></span>Créer une nouvelle réalisation
        </a>
    </div>

@endsection

