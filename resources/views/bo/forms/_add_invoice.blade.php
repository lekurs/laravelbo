<div class="mout-create-element-form-container">
    <form action="{{route('saveInvoice', $estimation->id)}}" name="addElement" method="post">
    @include('bo.forms.errors')
        @csrf

        <div class="form-group">
            <label for="name" class="float-label">Numéro de la facture*</label>
            <input type="number" class="form-control" name="invoice-number" id="invoice-number">
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Intitulé de la facture*</label>
            <input type="text" class="form-control" name="invoice-title" id="invoice-title" value="{{$estimation->title}}">
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Montant HT *</label>
            <input type="number" class="form-control" name="invoice-price" id="invoice-price" value="{{$estimation->price}}">
        </div>

        <button type="submit" class="btn btn-dark mout-btn-add-button">Ajouter</button>
    </form>
</div>
