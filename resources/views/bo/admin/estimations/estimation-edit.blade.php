@extends('admin-layout')

@section('title', 'Mise à jour du devis : ' . $estimation->number)

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Mise à jour du devis : {{$estimation->number}}</h2>

        <div class="mout-admin-container">
                @include('bo.forms._edit_estimation')
            </div>
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
