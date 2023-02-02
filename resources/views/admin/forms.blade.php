@extends('layouts.app')

@section('css')
<link href="{{ url("assets/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">    
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-bordered" id="allForms" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>N° de commande</th>
                <th>Utilisateur</th>
                <th>Valeur</th>
                <th>Code</th>
                <th>Status</th>
                <th>Adresse de paiement</th>
                <th>Type</th>
                <th>Date de création</th>
                <th>Modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forms as $form)
            <tr>
                <td>#{{ $form->id }}</td>
                <td>{{ \App\Models\User::getName($form->userId) }}</td>
                <td>{{ $form->value }}€</td>
                <td>{{ $form->code }}</td>
                <td>{{ \App\Models\Convertions::getType($form->type) }}</td>
                <td>{{ $form->payment }}</td>
                <td>{!! \App\Models\Convertions::getStatus($form->status) !!}</td>
                <td>{{ \Carbon\Carbon::parse($form->created_at)->diffForHumans() }}</td>
                <td>
                    <button class="btn btn-info btn-icon-split form" data-toggle="modal" data-target="#modificationModal" formId="{{ $form->id }}" status="{{ \App\Models\Convertions::getStatus($form->status) }}">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-info-circle"></i>
                        </span>
                        <span class="text">Modifier la commande #{{ $form->id }}</span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>N° de commande</th>
                <th>Utilisateur</th>
                <th>Valeur</th>
                <th>Code</th>
                <th>Type</th>
                <th>Adresse de paiement</th>
                <th>Status</th>
                <th>Date de création</th>
                <th>Modification</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modification modal -->
<div class="modal fade" id="modificationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST" id="formRequest">
                @csrf
                @method("POST")
                <div class="form-group">
                    <label>Status actuel</label>
                    <span id="statusNow"></span>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="1">Demande en attente</option>
                        <option value="2">Demande validée</option>
                        <option value="3">Demande refusée</option>
                        <option value="4">Carte PSC Junior</option>
                    </select>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-outline-success">Sauvegarder</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ url("assets/datatables/jquery.dataTables.min.js") }}" ></script>
<script src="{{ url("assets/datatables/dataTables.bootstrap4.min.js") }}" ></script>
<script>
    $(document).ready(function() {
        $("#allForms").DataTable();
        $(".form").off("click").on("click", function() {
            const formId = $(this).attr("formId");
            const statusNow = $(this).attr("status");
            $("#modalTitle").html(`Commande #${formId}`);
            $("#formRequest").attr("action", `./conversions/${formId}`);
            $("#statusNow").html(statusNow);
        })
    });
</script>
@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: '{{ $error }}'
            })
        </script>
    @endforeach
@endif

@if(session("success.request_updated"))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: '{{ session("success.request_updated") }}'
        })
    </script>
@endif

@endsection