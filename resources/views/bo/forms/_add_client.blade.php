
<form action="{{route('addClient')}}" name="addElement" method="post" enctype="multipart/form-data" class="w-100">
    @csrf
    <div class="mout-form-double-container">
        <div class="left-form-container">
            <h3>Société</h3>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="client-name">
                <label for="name" class="float">Nom *</label>
                <span class="highlight"></span>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="client-phone">
                <label for="phone" class="float">Téléphone</label>
                <span class="highlight"></span>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="client-address">
                <label for="address" class="float">Adresse</label>
                <span class="highlight"></span>
            </div>
            <div class="floating-label">
                <input type="number" class="floating-input" placeholder=" " name="client-zip">
                <label for="zip" class="float">Code postal</label>
                <span class="highlight"></span>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="client-city">
                <label for="city" class="float">Ville</label>
                <span class="highlight"></span>
            </div>
            <div class="floating-label">
                <input type="number" class="floating-input" placeholder=" " name="client-siren">
                <label for="siren" class="float">Siren</label>
                <span class="highlight"></span>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Logo</span>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="client-logo" name="client-logo"
                           aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
                </div>
            </div>
        </div>

        <div class="right-form-container">
            <h3>Contact</h3>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="contact-name">
                <label for="name" class="float">Nom *</label>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="contact-lastname">
                <label for="name" class="float">Prénom *</label>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="contact-phone">
                <label for="phone" class="float">Téléphone</label>
            </div>
            <div class="floating-label">
                <input type="text" class="floating-input" placeholder=" " name="contact-email">
                <label for="address" class="float">Email</label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn mout-btn-add">
            <span class="btn-label"><i class="fal fa-plus"></i></span>Ajouter</button>
        <button type="button" class="btn mout-btn-edit btn-cancel">
            <span class="btn-label"><i class="fal fa-times"></i></span>Annuler</button>
    </div>
</form>
