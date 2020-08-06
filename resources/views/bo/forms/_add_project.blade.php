<form action="{{route('projectCreationStore')}}" method="post" name="addProject" id="addFormProject" enctype="multipart/form-data">
    @include('bo.forms.errors')
    @csrf
    <div class="mout-bo-estimation-client-container">
        <div class="mout-bo-estimation-contact-content floating-label">
            <input type="text" name="project-title" id="project-title" class="floating-input" placeholder=" ">
            <label for="project-title" class="float">Intitulé</label>
            <span class="highlight"></span>
        </div>
    </div>

    <div class="floating-label">
        <select name="service-client" class="" id="service-client">
            @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="floating-label">
        @foreach($services as $service)
            <input type="checkbox" name="project-service" id="{{$service->libelle}}" class="custom-radio" value="{{$service->id}}">
            <label for="{{$service->libelle}}">{{$service->libelle}}</label>
        @endforeach
    </div>

    <div class="floating-label">
        <div class="mout-bo-estimation-content">
            <textarea name="project-mission" id="project-mission" cols="30" rows="10" placeholder="Description de la mission"></textarea>
        </div>
    </div>

    <div class="floating-label">
        <div class="mout-bo-estimation-content">
            <textarea name="project-result" id="project-result" cols="30" rows="10" placeholder="Description du résultat"></textarea>
        </div>
    </div>

    <div class="floating-label">
        <div class="mout-bo-estimation-content">
            <input class="color-picker" id="project-color" name="project-color">
        </div>
    </div>

    <div class="floating-label input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" multiple class="custom-file-input" id="imagePortfolio" name="imagePortfolio" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="inputGroupFile01">Image portfolio</label>
        </div>
    </div>

    <div class="images">
        <div class="pic">
            <input type="file" name="images[]" class="images-input" accept="image/*" multiple>
            add
        </div>
    </div>

    <button type="submit" class="btn mout-btn-add">Enregistrer</button>
</form>
