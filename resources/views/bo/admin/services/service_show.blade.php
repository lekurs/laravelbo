@extends('admin-layout')

@section('title', 'Nos services')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Nos services</h2>
        @if (!empty($services))
            <div class="services-container">
            @foreach($services as $service)
                <div class="service-content">
                    <div class="service-title">{{ $service->libelle }}</div>
                    <div class="service-description">{!! $service->description !!}</div>
                    <div class="service-update">
                        <i class="fas fa-edit mout-bo-edit-icon" data-service="{{$service->id}}"></i>
                        <i class="fas fa-trash" data-service="{{$service->id}}"></i>
                    </div>
                </div>
            @endforeach
            </div>
        @endif

        <div class="mout-client-creation-buttons-container">
            <a href="{{route('createService')}}" class="btn btn-mout mout-btn-add">
                <span class="btn-label"><i class="fal fa-chevron-right"></i></span>Créer un service
            </a>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('js/admin/bo-edit-service.js')}}">
        $.updateService({
            script: '/admin/services/edit/'
        })
    </script>
@endsection
