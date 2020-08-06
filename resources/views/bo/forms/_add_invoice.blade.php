<div class="mout-create-element-form-container">
    <form action="{{route('saveInvoice', $estimation->id)}}" name="addElement" method="post">
    @include('bo.forms.errors')
        @csrf

        <div class="floating-label">
            <input type="text" class="form-control floating-input" name="invoice-title" id="invoice-title" value="{{$estimation->title}}" placeholder=" ">
            <label for="name" class="float">Intitulé de la facture*</label>
        </div>
        <div class="floating-label">
            <input type="number" class="form-control floating-input" name="invoice-price" id="invoice-price" value="{{$estimation->price}}" placeholder=" ">
            <label for="name" class="float">Montant HT *</label>
        </div>

        <button type="submit" class="btn btn-dark mout-btn-add-button">Ajouter</button>
    </form>
</div>
