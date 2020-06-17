<form action="{{route('submitEditEstimation', $estimation->id)}}" method="post" name="editEstimation" id="editFormEstimation" class="mout-form">
    @include('bo.forms.errors')
    @csrf
    <div class="mout-bo-estimation-client-container">
        <div class="mout-bo-estimation-client-content">
            <p>{{$estimation->client->name}}</p>
            <p>{{$estimation->client->address}}</p>
            <p>{{$estimation->client->zip}} {{$estimation->client->city}}</p>
            <input type="hidden" value="{{$estimation->client->id}}" name="estimation-client" id="estimation-client">
        </div>
        <div class="mout-bo-estimation-contact-content floating-label">
            <label for="exampleFormControlSelect1">Contacts</label>
            <select class="form-control" id="contacts" name="estimation-contact">
                <option value="">Choisissez votre contact</option>
                @foreach($estimation->client->contacts()->get() as $contact)
                    <option value="{{$contact->id}}" @if($estimation->contact_id === $contact->id) selected @endif>{{$contact->name . ' ' . $contact->lastname}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="floating-label">
        @foreach($services as $service)
            <input type="radio" name="estimation-service-type" id="{{$service->libelle}}" class="custom-radio" @if($estimation->service_id === $service->id) checked @endif value="{{$service->id}}">
            <label for="{{$service->libelle}}">{{$service->libelle}}</label>
        @endforeach
    </div>

    <div class="floating-label">
        <input type="checkbox" name="estimation-validation" id="estimation-validation" @if($estimation->validation) checked @endif value="1">
        <label for="estimation-validation">Validé</label>
    </div>

    <div class="floating-label">
        <input type="text" name="estimation-title" id="estimation-title" placeholder=" " class="floating-input" value="{{$estimation->title}}">
        <label for="title" class="float">Titre</label>
    </div>

    <div class="mout-bo-estimation-container floating-label">
        <div class="mout-bo-estimation-content">
            <textarea name="estimation-body" id="estimation-body" cols="30" rows="10" placeholder="Description">{{$estimation->body}}</textarea>
        </div>
    </div>
    <div class="mout-bo-estimation-container floating-label">
        <input type="number" name="estimation-amount" id="estimation-amount" class="floating-input" placeholder=" " value="{{$estimation->price}}">
        <label for="estimation-amount" class="float">Prix</label>
        <span class="highlight"></span>
    </div>
    <button type="submit" class="btn mout-btn-add">Enregistrer</button>
</form>
