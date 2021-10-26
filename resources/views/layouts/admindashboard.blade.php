<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Gaji</title>
    <link href="{{ url('frontend/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo-tok.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ url('logo-tok.png')}} />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="{{ route('dashboardadmin')}}">
            <i class="fas fa-wallet mr-3"></i>
            Sistem Penggajian
        </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
            data-feather="menu"></i></button>
        <div class="small">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            KPP Pratama Pajak Gianyar
        </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid"
                        src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">Test Nama Pegawai</div>
                            <div class="dropdown-user-details-email">Test Role Pegawai</div>
                        </div>
                    </h6>


                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('login') }}">
                        <div class="dropdown-item-icon"><i data-feather="columns"></i></div>
                        Dashboard
                    </a>


                    <a class="dropdown-item" href="" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>

                    <form id="logout-form" action="" method="POST" style="display: none;">
                        @csrf
                    </form>



                </div>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                      
                        <div class="sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="{{ route('dashboardadmin')}}">
                            <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Dashboard
                        </a>
                        <div class="sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Master Data
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="{{ route('master-pegawai.index') }}">
                                    Pegawai
                                </a>
                                <a class="nav-link" >
                                    Golongan
                                </a>
                                <a class="nav-link" >
                                    Jabatan
                                </a>
                                <a class="nav-link" href="{{ route('unit-kerja.index') }}" >
                                    Unit Kerja
                                </a>
                                <a class="nav-link" href="{{ route('master-ptkp.index') }}">
                                    PTKP
                                </a>
                                
                            </nav>
                        </div>
                        <div class="sidenav-menu-heading">Penggajian</div>
                        <a class="nav-link">
                            <div class="nav-link-icon"><i class="fas fa-calculator"></i></div>
                            Data Gaji Pegawai
                        </a>
                       <div class="sidenav-menu-heading">Logout Account</div>
                        <a class="nav-link" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <div class="nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>

               
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">Role :</div>
                        <div class="sidenav-footer-title">Test Role</div>
                    </div>
                </div>
            </nav>
        </div>
        


        <div id="layoutSidenav_content" class="bg-gray-200">

           
            @yield('content')


           
            <footer class="footer mt-auto ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center text-muted">Copyright &copy; 2021 Aplikasi Penggajian KPP Pratama Pajak Gianyar</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/frontend/dist/js/scripts.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/frontend/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/frontend/dist/assets/demo/datatables-demo.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/frontend/dist/assets/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>

</html>
