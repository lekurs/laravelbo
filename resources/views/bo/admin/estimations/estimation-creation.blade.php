@extends('admin-layout')

@section('title', 'Nos devis')

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Créer un devis pour {{$client->name}}</h2>
        <form action="{{route('storeEstimation')}}" method="post" name="addEstimation" id="addFormEstimation">
            @include('bo.forms.errors')
            <div class="mout-bo-estimation-client-container">
                <div class="mout-bo-estimation-client-content">
                    <p>{{$client->name}}</p>
                    <p>{{$client->address}}</p>
                    <p>{{$client->zip}} {{$client->city}}</p>
                    <input type="hidden" value="{{$client->id}}" name="estimation-client" id="estimation-client">
                </div>
                <div class="mout-bo-estimation-contact-content floating-label">
                    <label for="exampleFormControlSelect1">Contacts</label>
                    <select class="form-control" id="contacts" name="estimation-contact">
                        <option value="">Choisissez votre contact</option>
                        @foreach($client->contacts()->get() as $contact)
                            <option value="{{$contact->id}}">{{$contact->name . ' ' . $contact->lastname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="floating-label">
                @foreach($services as $service)
                <input type="radio" name="estimation-service-type" id="{{$service->libelle}}" class="custom-radio" value="{{$service->id}}">
                <label for="{{$service->libelle}}">{{$service->libelle}}</label>
                @endforeach
            </div>

            <div class="floating-label">
                <input type="checkbox" name="estimation-validation" id="estimation-validation" value="1">
                <label for="estimation-validation">Validé</label>
            </div>

            <div class="floating-label">
                <input type="text" name="estimation-title" id="estimation-title" placeholder=" " class="floating-input">
                <label for="title" class="float">Titre</label>
            </div>

            <div class="mout-bo-estimation-container floating-label">
                <div class="mout-bo-estimation-content">
                    <textarea name="estimation-body" id="estimation-body" cols="30" rows="10" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="mout-bo-estimation-container floating-label">
                <input type="number" name="estimation-amount" id="estimation-amount" class="floating-input" placeholder=" ">
                <label for="estimation-amount" class="float">Prix</label>
                <span class="highlight"></span>
            </div>
            <button type="submit" class="btn mout-btn-add">Enregistrer</button>
        </form>
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
