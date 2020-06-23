@extends('layouts.public-layout')

@section('title', 'Bienvenue')

@section('body')
    <header>
        <div class="container-fluid">
            <div class="mout-pub-header-container">
                <h1>mout</h1>
                <h2>l’agence geek et créative</h2>
            </div>
            <div class="mout-pub-panel" id="top-panel">
                nav
            </div>
            <div class="mout-pub-panel" id="left-panel">
                <div class="mout-pub-rs-container">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook-f"></i>
                </div>
            </div>
            <div class="mout-pub-panel" id="right-panel"></div>
        </div>
    </header>

    <section class="mout-description-section">
        
    </section>
@endsection
