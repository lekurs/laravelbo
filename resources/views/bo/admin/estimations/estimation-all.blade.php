@extends('admin-layout')

@section('title', 'Devis en cours' )

@section('body')
    <div class="mout-bo-section-container">
        <h2 class="admin-title">Devis en cours</h2>

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
                    <td><i class="@if($estimation->invoice) fal fa-thumbs-up @else fal fa-thumbs-down @endif"></i></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('#estimation-table').DataTable();
        } );
    </script>
@endsection
