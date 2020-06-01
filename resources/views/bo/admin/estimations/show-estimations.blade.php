@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <h2 class="admin-title">Nos devis</h2>

{{--    <div class="mout-create-navigation-container">--}}
{{--        <a href="{{route('addClient')}}" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </a>--}}
{{--    </div>--}}

{{--    <form class="form-inline d-flex justify-content-center md-form form-sm mt-0">--}}
{{--        <i class="fas fa-search" aria-hidden="true"></i>--}}
{{--        <input class="form-control form-control-sm ml-3 w-75 search-bar" type="text" placeholder="Search"--}}
{{--               aria-label="Search" data-source="{{$estimations}}">--}}
{{--    </form>--}}


    <div data-editable data-name="main-content">
        <blockquote>
            Always code as if the guy who ends up maintaining your code will be a violent psychopath who knows where you live.
        </blockquote>
        <p>John F. Woods</p>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/wysiwyg/content-tools.js')}}"></script>
{{--    <script src="{{asset('vendor/wysiwyg/sandbox.js')}}"></script>--}}

    <script src="{{asset('js/imageUploaderContentTools/imageUploaderHelper.js')}}"></script>
@endsection
