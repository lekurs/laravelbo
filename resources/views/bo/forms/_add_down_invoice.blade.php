<div class="mout-create-element-form-container">
    <form action="{{route('saveDownPaiementInvoice', $estimation->id)}}" name="addElement" method="post">
    @include('bo.forms.errors')
        @csrf

        <div class="form-group">
            <label for="name" class="float-label">Numéro de la facture d'acompte*</label>
            <input type="number" class="form-control" name="down-invoice-number" id="down-invoice-number">
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Intitulé de la facture d'acompte*</label>
            <input type="text" class="form-control" name="down-invoice-title" id="down-invoice-title" value="{{$estimation->title}}">
        </div>
        <div class="form-group">
            <label for="name" class="float-label">Montant HT *</label>
            <input type="number" class="form-control" name="down-invoice-price" id="down-invoice-price">
        </div>

        <button type="submit" class="btn btn-dark mout-btn-add-button">Ajouter</button>
    </form>
</div>
