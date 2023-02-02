@extends('layouts.app')

@section('css')
<link href="{{ url("assets/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">    
@endsection

@section('content')
<h1 class="h3 mb-2 text-gray-800">Gestion des utilisateurs</h1>
<p class="mb-4">Vous pouvez gérer les utilisateurs ici.</p>

<div class="table-responsive">
    <table class="table table-bordered" id="allForms" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Identité</th>
                <th>Email</th>
                <th>Date de création</th>
                <th>Mot de passe oublié</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allUsers as $user)
            <tr>
                <td>#{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                <td>
                    <a href="{{ url("./panel/admin/utilisateurs/{$user->id}") }}" class="btn btn-purple btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fa-solid fa-key"></i>
                        </span>
                        <span class="text">Réinitialiser le mot de passe de {{ $user->name }}</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Identifiant</th>
                <th>Identité</th>
                <th>Email</th>
                <th>Date de création</th>
                <th>Mot de passe oublié</th>
            </tr>
        </tfoot>
    </table>
</div>


@endsection

@section('js')
<script src="{{ url("assets/datatables/jquery.dataTables.min.js") }}" ></script>
<script src="{{ url("assets/datatables/dataTables.bootstrap4.min.js") }}" ></script>

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

@if(session("success.user_updated"))
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
            title: '{{ session("success.user_updated") }}'
        })
    </script>
@endif
@endsection