@extends('layouts.public-layout')

@section('title', 'Bienvenue')

@section('body')
    <header>
        <div class="container-fluid">
            <div class="mout-pub-panel" id="top-panel">
                nav
            </div>
            <div class="mout-pub-header-container">
                <h1>mout</h1>
                <h2>l’agence geek et créative</h2>
            </div>
            <div class="mout-pub-panel" id="left-panel">
                <div class="mout-pub-rs-container">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook-f"></i>
                </div>
            </div>
        </div>
    </header>

    <section class="mout-description-section">
        <h3>mout en quelques mots</h3>
        <div class="mout-description-container">
            <span>1. <i class="far fa-telescope"></i></span>
            <span>2. <i class="fal fa-satellite"></i></span>
            <span>3. <i class="fal fa-moon-stars"></i></span>
            <span>4. <i class="fal fa-planet-ringed"></i></span>
            <span>5. <i class="fal fa-solar-system"></i></span>
            <span>6. <i class="fal fa-ufo"></i></span>
            <span>7. <i class="fal fa-comet"></i></span>
            <span>8. <i class="fal fa-star-shooting"></i></span>
            <span>9. <i class="fal fa-user-astronaut"></i></span>
            <span>10. <i class="fal fa-starship"></i></span>
        </div>
    </section>

    <section class="mout-services-description">
        <h3>Services</h3>

        <div class="services-icon-container">
            @foreach($services as $service)
                <a href="#" data-service="{{\Illuminate\Support\Str::slug($service->libelle)}}">
                    <p>{{$service->libelle}}</p>
                    <i class="{{$service->icon}}"></i>
                </a>
            @endforeach
        </div>
        <div class="services-description-container">
            @foreach($services as $service)
                <div class="services-description-content" id="{{\Illuminate\Support\Str::slug($service->libelle)}}">
                    <h4 class="service-description-title">Notre expertise</h4>
                    <p>{!! $service->description !!}</p>
                    <a href="" class="btn btn-mout">En savoir +</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mout-realisations">
        <h3>Nos réalisations</h3>
    </section>
@endsection

@section('js')
    <script src="{{asset('js/public/descriptions.js')}}"></script>
@endsection
