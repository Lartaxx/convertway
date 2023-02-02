@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Mon profil</h1>
    <p class="mb-4">Vous pouvez gérer votre mot de passe ici.</p>

    <form action="#" method="POST">
        @csrf
        @method("POST")
        <div class="form-group">
            <label>Mot de passe actuel</label>
            <input type="password" class="form-control" placeholder="Votre mot de passe actuel" name="actualPassword">
          </div>
        <div class="form-group">
          <label>Nouveau mot de passe</label>
          <input type="password" class="form-control" placeholder="Votre nouveau mot de passe" name="newPassword">
        </div>
        <div class="form-group">
            <label>Répéter votre nouveau mot de passe</label>
            <input type="password" class="form-control" placeholder="À nouveau votre nouveau mot de passe" name="repeatedNewPassword">
          </div>
        <button type="submit" class="btn btn-success btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fa-solid fa-check"></i>
            </span>
            <span class="text">Envoyer le formulaire</span>
        </button>      
    </form>
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

    @if(session("error.user_updated"))
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
                title: '{{ session("error.user_updated") }}'
            })
        </script>
    @endif
@endsection