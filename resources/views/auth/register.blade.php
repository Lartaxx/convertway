<!DOCTYPE html>
<html lang="fr-FR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ConvertWay - Inscription</title>

   <!-- Custom fonts for this template-->
   <link
   href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
   rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url("css/sb-admin-2.min.css") }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0017d4f378.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="bg-gradient-purple">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Inscription | CONVERT<span style="color: #ffba0b">W</span>AY</h1>
                            </div>
                            <form class="user" action="{{ route("register_callback") }}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" placeholder="Prénom" name="firstName">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" placeholder="Nom" name="lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" placeholder="Adresse email" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" placeholder="Mot de passe" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" placeholder="Confirmer le mot de passe" name="passwordConfirmed">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-purple btn-user btn-block">
                                    S'inscrire
                                </button>
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Mot de passe oublié ?</a>
                            </div> --}}
                            <div class="text-center">
                                <a class="small" href="{{ route("login_view") }}">Déjà un compte ? Connectez-vous !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url("assets/jquery/jquery.min.js") }}"></script>
    <script src="{{ url("assets/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url("assets/jquery-easing/jquery.easing.min.js") }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url("js/sb-admin-2.min.js") }}"></script>

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

    @if(session("error.register"))
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
                title: '{{ session("error.register") }}'
                })
        </script>
    @endif
</body>

</html>