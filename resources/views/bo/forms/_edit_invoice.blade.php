<form action="{{route('submitEditInvoie', $invoice->id)}}" name="editInvoice" method="post" class="mout-form">
    @csrf
    @include('bo.forms.errors')

    <div class="floating-label">
        <input type="text" class="form-control floating-input" name="invoice-title" id="invoice-title" value="{{$invoice->title}}" placeholder=" ">
        <label for="name" class="float">Intitulé de la facture*</label>
    </div>
    <div class="floating-label">
        <input type="number" class="form-control floating-input" name="invoice-price" id="invoice-price" value="{{$invoice->amount}}" placeholder=" ">
        <label for="name" class="float">Montant HT *</label>
    </div>

    <button type="submit" class="btn mout-btn-add bnt-labeled"><span class="btn-label"><i class="fal fa-chevron-right"></i></span>Mettre à jour</button>
</form>
