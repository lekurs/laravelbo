{{--<div class="mout-create-navigation-container">--}}
{{--    <button type="button" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </button>--}}
{{--</div>--}}

<div class="mout-create-navigation-content showNav">
    <div></div>
    <div class="mout-create-element-form-container">
        <form method="post" action="{{route('editContact', $contact->slug)}}" name="editContactForm" id="editContactForm">
            @include('bo.forms.errors')
            @csrf
            <h3>Contact</h3>
            <div class="form-group">
                <label for="name" class="float-label">Nom *</label>
                <input type="text" class="form-control" name="contact-name" id="contact-name" value="@if(!empty($contact)) {{$contact->name}} @endif">
            </div>
            <div class="form-group">
                <label for="name" class="float-label">Prénom *</label>
                <input type="text" class="form-control" name="contact-lastname" id="contact-lastname" value="@if(!empty($contact)) {{$contact->lastname}} @endif">
            </div>
            <div class="form-group">
                <label for="name" class="float-label">Téléphone *</label>
                <input type="number" class="form-control" name="contact-phone" id="contact-phone" value="@if(!empty($contact))  {{$contact->phone}} @endif">
            </div>
            <div class="form-group">
                <label for="name" class="float-label">Email *</label>
                <input type="email" class="form-control" name="contact-email" id="contact-email" value="@if(!empty($contact)) {{$contact->email}} @endif">
            </div>
            <button type="submit" class="btn btn-submit btn-dark">Enregistrer</button>
            <button type="button" class="btn btn-cancel-edit">Annuler</button>
        </form>
    </div>
</div>
