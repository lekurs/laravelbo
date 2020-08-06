<div class="mout-create-element-form-container">
    <form action="{{route('storeService')}}" name="addElement" method="post">
    @include('bo.forms.errors')
        @csrf

        <div class="floating-label">
            <input type="text" class="form-control floating-input" name="service-wording" id="service-wording" placeholder=" ">
            <label for="name" class="float">Libellé</label>
            <span class="highlight"></span>
        </div>
        <div class="mout-bo-estimation-container floating-label">
            <div class="mout-bo-estimation-content">
                <textarea name="service-description" id="service-description" cols="30" rows="10" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="floating-label">
            <input type="text" class="form-control floating-input" name="service-icon" id="service-icon" placeholder=" ">
            <label for="name" class="float">Icone</label>
            <span class="highlight"></span>
        </div>

        <button type="submit" class="btn btn-dark mout-btn-add-button">Ajouter</button>
    </form>
</div>
