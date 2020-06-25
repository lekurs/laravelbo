@extends('admin-layout')

@section('title', 'Création d\'une nouvelle réalisation')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer une nouvelle réalisation</h2>
        <div class="mout-estimation-container">
            @include('bo.forms._add_project')
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/colorpicker/color-picker.js')}}"></script>
    <script src="{{asset('js/admin/autocomplete.js')}}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'a11ychecker advcode linkchecker autolink media mediaembed powerpaste tinymcespellchecker',
            toolbar_mode: 'floating',
        });

        $('#service-client').autocompletion({
            width: 300,
            placeholder:"recherchez vos clients",
            multiple:false,
            inputClass: 'floating-input',
            resultClass: ''
        });
    </script>
@endsection
