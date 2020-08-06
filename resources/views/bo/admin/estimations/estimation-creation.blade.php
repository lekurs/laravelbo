@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer un devis pour {{$client->name}}</h2>
        @include('bo.forms._add_estimation')
    </div>


@endsection

@section('js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode linkchecker autolink media mediaembed powerpaste tinymcespellchecker',
            toolbar_mode: 'floating',
        });
    </script>
@endsection
