<div class="mout-create-element-form-container">
    <form action="{{route('createEstimation')}}" name="addElement" method="post">
    @include('bo.forms.errors')
        @csrf
        <div id="autocomplete"></div>

        <div class="form-group">
            <select name="contacts" id="contacts">
                @foreach($contacts as $contact)
                    <option value="{{$contact->id}}" name="contact-id">{{$contact->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Numéro du devis*</label>
            <input type="number" class="form-control" name="estimation-number" id="estimation-number">
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Intitulé du devis*</label>
            <input type="text" class="form-control" name="estimation-title" id="estimation-title">
        </div>
{{--        <div data-editable data-name="main-content">--}}
{{--            <blockquote>Ecrivez ici votre devis</blockquote>--}}
{{--        </div>--}}
        <div class="form-group">
            <textarea name="estimation-body" class="form-control" id="estimation-body" placeholder="tapez votrez texte"></textarea>
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Montant HT *</label>
            <input type="number" class="form-control" name="estimation-price" id="estimation-price">
        </div>

        <button type="submit" class="btn mout-btn-add-button">Ajouter</button>
    </form>
</div>
