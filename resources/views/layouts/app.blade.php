<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ConvertWay - Panel</title>

    <!-- Custom fonts for this template-->
    @yield("css")
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
     <!-- Custom styles for this template-->
     <link href="{{ url("css/sb-admin-2.min.css") }}" rel="stylesheet">
     <script src="https://kit.fontawesome.com/0017d4f378.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     </head>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-purple sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("panel_view") }}">
                <div class="sidebar-brand-icon">
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Convert<sup>WAY</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route("panel_view") }}">
                    <i class="fa-solid fa-table-columns"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Utilisateur
            </div>

              <!-- Nav Item - Charts -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route("panel_convert_view") }}">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    <span>Convertir</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("my_convert_view") }}">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    <span>Mes conversions</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            @admin
            <!-- Heading -->
            <div class="sidebar-heading">
                Administrateur
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin_forms_view") }}">
                    <i class="fa-brands fa-wpforms"></i>
                    <span>Formulaires</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin_users_view") }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Gestion des utilisateurs</span></a>
            </li>

            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            @endadmin
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                       

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{ Auth::user()->unreadNotifications->count() }}+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications
                                </h6>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                    @foreach (Auth::user()->unreadNotifications->take(3) as $notification)
                                        <a class="dropdown-item d-flex align-items-center">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-primary">
                                                    <i class="fas fa-info-circle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</div>
                                                <span class="font-weight-bold">{{ $notification["data"]["notification"]["body"] }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route("notif.mark_all_as_read") }}">Tout marquer comme lu</a>
                            </div>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route("my_profile_view") }}">
                                    <i class="fa-solid fa-address-card fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="{{ route("logout") }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield("content")

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ConvertWAY {{ date("Y") }} <br> made by Lartaxx</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   <!-- Bootstrap core JavaScript-->
   <script src="{{ url("assets/jquery/jquery.min.js") }}"></script>
   <script src="{{ url("assets/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{ url("assets/jquery-easing/jquery.easing.min.js") }}"></script>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{ url("js/sb-admin-2.min.js") }}"></script>

   @yield("js")

</body>

</html>