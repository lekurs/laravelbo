@extends('admin-layout')

@section('title', 'Suivi des performances')

@section('body')
    <div class="mout-estimations-container">
        <div class="mout-bo-panel-container">
            <div class="mout-bo-panel">
                <div class="mout-bo-panel-icon"><i class="fas fa-euro-sign fa-3x"></i></div>
                <div class="mout-bo-panel-libelle">
                    <p>Devis en cours </p>
                    <p class="mout-bo-panel-progress-invoice">
                        <span id="total-estimations-encours">{{$totalEstimationsValidated}}</span> €<sup>HT</sup>
                    </p>
                </div>
            </div>

            <div class="mout-bo-panel">
                <div class="mout-bo-panel-icon"><i class="fas fa-euro-sign fa-3x"></i></div>
                <div class="mout-bo-panel-libelle">
                    <p>Encours de facturation </p>
                    <p class="mout-bo-panel-progress-invoice">
                        <span id="total-invoices-encours">{{$totalInvoicesNotPaid}}</span> €<sup>HT</sup>
                    </p>
                </div>
            </div>

            <div class="mout-bo-panel">
                <div class="mout-bo-panel-icon"><i class="fas fa-euro-sign fa-3x"></i></div>
                <div class="mout-bo-panel-libelle">
                    <p>CA {{date('Y')}}</p>
                    <p class="mout-bo-panel-progress-invoice">
                        <span id="total-invoices-encours">{{$totalCa}}</span> €<sup>HT</sup>
                    </p>
                </div>
            </div>

        </div>

        <div class="mout-bo-section-container">
            <h2>Devis en encours</h2>
            <table class="table-striped table-hover mout-bo-table" id="estimation-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Intitulé</th>
                    <th>Prix</th>
                    <th>Date</th>
                    <th>Validé</th>
                    <th>Facturé</th>
                </tr>
                </thead>
                <tbody>
                @foreach($estimations as $estimation)
                    <tr>
                        <td>{{$estimation->number}}</td>
                        <td><a href="{{route('showOneEstimation', $estimation->id)}}" >{{$estimation->title}}</a></td>
                        <td>{{$estimation->price}}</td>
                        <td>{{$estimation->created_at->format('d/m/Y')}}</td>
                        <td><i class="fas fa-circle @if($estimation->validation === 1) green-circle @else red-circle @endif"></i></td>
                        <td><a href="{{route('createInvoice', $estimation->id)}}" class="dflex justify-content-center"><i class="@if($estimation->invoice) fal fa-thumbs-up @else fal fa-thumbs-down @endif"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mout-bo-section-container">
            <div class="mout-estimation-container">
                <h2>Encours factures</h2>
                <table class="table-striped table-hover mout-bo-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Intitulé</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Acompte</th>
                        <th>Réglée</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoicesNotPaid as $invoiceNotPaid)
                        <tr>
                            <td>{{$invoiceNotPaid->number}}</td>
                            <td><a href="{{route('oneInvoice', $invoiceNotPaid->id)}}" >{{$invoiceNotPaid->title}}</a></td>
                            <td>{{$invoiceNotPaid->amount}}</td>
                            <td>{{$invoiceNotPaid->created_at->format('d/m/Y')}}</td>
                            <td>@if(!is_null($invoiceNotPaid->downpaiementinvoice_id)) {{$invoiceNotPaid->downpaiementinvoice_id}} @else Pas d'acompte @endif</td>
                            <td class="mout-invoice-validation" data-invoice="{{$invoiceNotPaid->id}}"><i class="far fa-coins" style="color:#D90000"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('js/admin/bo-mout-valide-invoice.js')}}"></script>
@endsection
