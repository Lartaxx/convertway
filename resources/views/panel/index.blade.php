@extends('layouts.app')

@section('content')
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">Heureux de vous voir !</h4>
    <p>Bienvenue sur votre panel ConvertWAY {{ Auth::user()->name }}, vous pouvez dès à présent naviguer sur le panel !</p>
    <hr>
    <p class="mb-0">Si vous avez une question / problème, veuillez vous rendre sur le <a href="{{ env("DISCORD_URL", true) }}">discord</a>.</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>

  <div class="row">
  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Argent convertis</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allMoney }}€</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-money-bill-trend-up text-gray-300 fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Nombre de cartes convertie(s)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allCards }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-credit-card fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Demandes refusées</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $refusedRequests }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-xmark fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Demandes en attente</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingRequests }}</div>
                </div>
                <div class="col-auto">
                    <i class="fa-solid fa-spinner fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

 </div>

@endsection

@section('js')
    @if(session("success.login"))
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
                title: '{{ session("success.login") }}'
                })
        </script>
    
    @elseif(session("error.not_admin"))
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
                title: '{{ session("error.not_admin") }}'
                })
        </script>
    
    @elseif(session("error.request_not_found"))
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
                title: '{{ session("error.request_not_found") }}'
                })
        </script>

    @elseif(session("success.user_updated"))
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