@extends('admin-layout')

@section('title', 'Nos services')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer un service</h2>
        @include('bo.forms._add_service')
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
