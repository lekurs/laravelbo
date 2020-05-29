@extends('admin-layout')

@section('title', 'client {{$client->name}}')

@section('body')
    <div class="mout-client-card-container">
        <div class="mout-client-card-left-content">
            <h3 class="mout-title-client-card">Fiche Client</h3>
            <h4 class="mout-title-client-name">{{$client->name}}</h4>

            @forelse($client->contacts as $contact)
            <p class="mout-client-card-info-bolder"><span><i class="far fa-smile contact-icon contact-smiley"></i></span>{{$contact->name}}</p>
            <p><span><i class="far fa-envelope contact-icon contact-envelope"></i></span>{{$contact->email}}</p>
            <p class="mout-client-card-info-bolder"><span><i class="fas fa-phone contact-icon contact-phone"></i></span>{{$contact->phone}}</p>
            <p><span><i class="fas fa-map-marker-alt contact-icon contact-marker"></i></span>{{$client->address}}</p>
            <p class="mout-client-card-city-informations">{{$client->zip}} {{$client->city}} </p>
            <p class="mout-client-card-info-bolder"><span><i class="fas fa-map-marker-alt contact-icon contact-marker"></i></span>{{$client->siren}}</p>
            @empty
            <p>pas de contact</p>
            @endforelse
        </div>
        <div class="mout-client-card-right-content">
            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-created-at"><i class="far fa-calendar-alt"></i></p>
                <p class="mout-client-card-title">Date de création</p>
                <p>{{$client->created_at->format('d/m/Y')}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-ca"><i class="far fa-calendar-alt"></i></p>
                <p class="mout-client-card-title">Ca {{date('M')}}</p>
                <p>{{$sumInvoiceOnMonth}} €</p>
            </div>

            <div class="mout-client-card-right-informations-container" id="estimations">
                <p id="mout-client-estimations"><i class="far far fa-file"></i></p>
                <p class="mout-client-card-title">Devis</p>
                <p id="mout-estimation-count">{{count($client->estimations)}}</p>
            </div>

            <div class="mout-client-card-right-informations-container" id="invoices">
                <p id="mout-client-bills"><i class="fas fa-file-invoice-dollar"></i></p>
                <p class="mout-client-card-title">Factures</p>
                <p id="mout-invoice-container">{{$totalInvoices}}</p>
            </div>

            <div class="mout-client-card-right-informations-container">
                <p id="mout-client-total-ca"><i class="fas fa-euro-sign"></i></p>
                <p class="mout-client-card-title" id="mout-client-total-ca-price">Total CA <br>
                    <span class="mout-client-card-total-ca-span">{{$totalEstimation}} €</span>
                </p>
            </div>
        </div>
    </div>

    <div class="mout-estimations-container">
        <div id="estimation-table-container">
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
                @foreach($client->estimationsByOrder as $estimation)
                <tr>
                    <td>{{$estimation->number}}</td>
                    <td><a href="{{route('showOneEstimation', $estimation->id)}}" >{{$estimation->title}}</a></td>
                    <td>{{$estimation->price}}</td>
                    <td>{{$estimation->created_at->format('d/m/Y')}}</td>
                    <td><i class="fas fa-circle @if($estimation->validation === 1) green-circle @else red-circle @endif"></i></td>
                    <td><i class="@if($estimation->invoice) fal fa-thumbs-up @else fal fa-thumbs-down @endif"></i></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div id="invoice-table-container">
            <table class="table-striped table-hover mout-bo-table" id="invoice-table">
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
                @foreach($client->invoices as $invoice)
                    <tr>
                        <td>{{$invoice->number}}</td>
                        <td><a href="{{route('showOneEstimation', $estimation->id)}}" >{{$invoice->title}}</a></td>
                        <td>{{$invoice->amount}}</td>
                        <td>{{$invoice->created_at->format('d/m/Y')}}</td>
                        <td><i class="fas fa-circle @if($invoice->validation === 1) green-circle @else red-circle @endif"></i></td>
                        <td><i class="@if($invoice->paid) fal fa-thumbs-up @else fal fa-thumbs-down @endif"></i></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            const estimation = $('.mout-client-card-right-informations-container#estimations');
            const invoice = $('.mout-client-card-right-informations-container#invoices');
            const estimationTable = $('#estimation-table-container');
            const invoiceTable = $('#invoice-table-container');

            $(estimation).click(function () {
                if ($(invoiceTable).hasClass('active')) {
                    $(invoiceTable).removeClass('active');
                }

                $(estimationTable).toggleClass('active');
            })

            $(invoice).click(function () {
                if($(estimationTable).hasClass('active')) {
                    $(estimationTable).removeClass('active');
                }
                $(invoiceTable).toggleClass('active');
            });
        });
    </script>

    <script>
        $(document).ready( function () {
            $('#estimation-table').DataTable();
            $('#invoice-table').DataTable();
        } );
    </script>
@endsection
