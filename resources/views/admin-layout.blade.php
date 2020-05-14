<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resolving - @yield('title')</title>
    @yield('styles')
    <script defer src="{{ mix('js/app.js') }}"></script>
{{--    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>--}}

    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/content-tools.min.css')}}">
{{--    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}

    <link href="https://fonts.googleapis.com/css?family=Assistant:200,300,400,600,700,800|Playfair+Display:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
{{--    Bootstrap ?--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @section('meta')
    <meta name="description" content="description du site" />
    @endsection

    @section('social')
    <!-- Création des metatags réseaux sociaux -->
    <!-- Metatags FB -->
    <meta property="og:title" content="Mout Web Agency" />
    <meta property="og:type" content="Mout Web Agency" />
    <meta property="og:url" content="moutwebdesign.com" />
    <meta property="og:description" content="Mout Web Agency" />
    <meta property="og:image" content="{{ asset('assets/images/logo/bandeau-mout.png') }}" />

    <!-- Metatag Twitter -->
    <meta name="twitter:card" content="Mout Web Agency" />
    <meta name="twitter:tittle" content="Mout Web Agency" />
    <meta name="twitter:description" content="Mout Web Agency" />
    @endsection
</head>
<body>
<header>
    <div class="mout-header-panel">
        <div class="mout-logo-panel">
            <h2>
                <a href="{{ route('admin') }}" class="mout-logo-panel-link">Mout</a>
            </h2>
        </div>
        <div class="mout-header-bar">
            <div class="header-bar-right">
                <ul class="header-bar-right-menu">
                    <li class="header-bar-right-menu-list">
                        <div class="btn-group">
                            <button type="button" class="btn"></button><a href="{{ route('admin') }}"><i class="fas fa-home"></i></a>
                        </div>
                    </li>
                    <li class="header-bar-right-menu-list">
                        <div class="btn-group dropdown-nav">
                            <button class="btn btn-logged" id="logged-dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('assets/images/uploads/users/clairegindre.png') }}" alt="Claire Gindre" class="img-fluid mout-login-portrait">
                                Claire Gindre
                                <span class="mout-log-arrow"></span>
                            </button>
                            <ul class="drop-menu pull-right">
                                <li>
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<section>
    <div class="mout-left-panel">
        <div class="mout-left-panel-informations">
            <div class="mout-left-panel-profil">
                <div class="mout-profil-left">
                    <img src="{{ asset('assets/images/uploads/users/clairegindre.png') }}" alt="Claire GINDRE" class="img-fluid img-portrait-bo-left-side">
                </div>
                <div class="mout-profil-right">
                    <h4 class="mout-profil-name">Claire Gindre</h4>
                    <span>Métier</span>
                </div>
            </div>
            <!-- TAB PANEL TOP -->
                @include('bo.nav._tab-panel-top')
        <!-- /TAB PANEL TOP -->

            <!-- TAB PANEL BOT -->
            <div class="mout-tab-content">
                @include('bo.nav._nav-pills-with-parent')
            </div>
            <!-- /TAB PANEL BOT -->
        </div>
    </div>

    <div class="mout-main-panel">
        <div class="mout-content-panel">
            @include('bo.flash.flash-message')
            @yield('body')

        </div>
    </div>
</section>

@yield('js')

</body>
</html>
