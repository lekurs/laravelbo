<div class="mout-create-navigation-container">
    <button type="button" class="btn mout-add-buttton"><i class="fas fa-plus"></i> </button>
</div>

<div class="mout-create-navigation-content">
    <div></div>
    <div class="mout-create-element-form-container">
        <form action="{{route('showClients')}}" name="addElement" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="float-label">Nom *</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="phone" class="float-label">Téléphone</label>
                <input type="text" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="address" class="float-label">Adresse</label>
                <input type="text" class="form-control" name="address">
            </div>
            <div class="form-group">
                <label for="zip" class="float-label">Code postal</label>
                <input type="number"  class="form-control" name="zip">
            </div>
            <div class="form-group">
                <label for="city" class="float-label">Ville</label>
                <input type="text" class="form-control" name="city">
            </div>
            <div class="form-group">
                <label for="siren" class="float-label">Siren</label>
                <input type="number" class="form-control" name="siren">
            </div>
            <div class="form-group">
                <button type="submit" class="btn mout-btn-add-button">Ajouter</button>
                <button type="button" class="btn mout-btn-add-button btn-cancel">Annuler</button>
            </div>
        </form>
    </div>
</div>
