@extends('layouts.app')

@section('css')
<link href="{{ url("assets/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">    
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Vos conversions</h1>
<p class="mb-4">Retrouvez ici toutes vos conversions effectuées et demandées sur ConvertWAY</p>
<div class="table-responsive">
    <table class="table table-bordered" id="myConvert" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>N° de commande</th>
                <th>Valeur</th>
                <th>Code</th>
                <th>Type</th>
                <th>Adresse de paiement</th>
                <th>Status</th>
                <th>Date de création</th>
                <th>Date de mise à jour</th>
            </tr>
        </thead>
        <tbody>
            @foreach($converts as $convert)
            <tr>
                <td>#{{ $convert->id }}</td>
                <td>{{ $convert->value }}€</td>
                <td>{{ $convert->code }}</td>
                <td>{{ \App\Models\Convertions::getType($convert->type) }}</td>
                <td>{{ $convert->payment }}</td>
                <td>{!! \App\Models\Convertions::getStatus($convert->status) !!}</td>
                <td>{{ \Carbon\Carbon::parse($convert->created_at)->diffForHumans() }}</td>
                <td>{{ \Carbon\Carbon::parse($convert->created_at)->eq(\Carbon\Carbon::parse($convert->updated_at)) ? "Pas de modification" : \Carbon\Carbon::parse($convert->updated_at)->diffForHumans()  }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>N° de commande</th>
                <th>Valeur</th>
                <th>Code</th>
                <th>Type</th>
                <th>Adresse de paiement</th>
                <th>Status</th>
                <th>Date de création</th>
                <th>Date de mise à jour</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('js')
<script src="{{ url("assets/datatables/jquery.dataTables.min.js") }}" ></script>
<script src="{{ url("assets/datatables/dataTables.bootstrap4.min.js") }}" ></script>
<script>
    $(document).ready(function() {
        $("#myConvert").DataTable();
    });
</script>
@endsection