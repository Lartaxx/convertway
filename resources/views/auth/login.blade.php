<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ConvertWay - Connexion</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Connexion | CONVERT<span style="color: #ffba0b">W</span>AY</h1>
                                    </div>
                                    <form class="user" action="{{ route("login_callback") }}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" placeholder="Adresse email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Mot de passe" name="password">
                                        </div>

                                        <button type="submit" class="btn btn-purple btn-user btn-block">
                                            Connexion
                                        </button>
                                    </form>                                       
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Mot de passe oublié ?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route("register_view") }}">Créer un compte !</a>
                                    </div>
                                </div>
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

    @if(session("success.register"))
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
                title: '{{ session("success.register") }}'
                })
        </script>
    
    @elseif(session("success.logout"))
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
                title: '{{ session("success.logout") }}'
                })
        </script>
    
    @elseif(session("error.login"))
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
                title: '{{ session("error.login") }}'
                })
        </script>
    
    @elseif(session("error.confirm_created_account"))
        <script>
            Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: 'Aucun compte existant à votre nom, voulez-vous en créer un avec votre compte Google ?',
            icon: 'warning',
            showDenyButton: true,
            confirmButtonText: 'Oui',
            confirmButtonColor: "#459B02",
            denyButtonText: `Non`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                const user =  "{{ session('error.confirm_created_account') }}";
                console.log(user);
                Swal.fire('Saved!', '', 'success')
            } 
            })
        </script>
    @endif

</body>

</html>