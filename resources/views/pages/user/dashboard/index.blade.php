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
    <link rel="shortcut icon" href="{{ asset('logodjp.jpg') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ url('logodjp.jpg')}} />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="background-color:#29387b">

    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11 mt-5">
                    <div class="row">
                        <div class="col-6">
                            <img class="img-fluid px-xl-4 " style="width: 9rem;"
                                src="/frontend/src/assets/img/freepik/logo-djp2.png">
                        </div>
                        <div class="col-6 text-right">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown no-caret mr-4 dropdown-user">
                                    <span class="small" style="color: white"> Hello,
                                        <span>{{ Auth::user()->nama_pegawai }}</span></span>
                                    <a class="btn btn-lg btn-icon btn-transparent-dark dropdown-toggle"
                                        id="navbarDropdownUserImage" href="javascript:void(0);" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                            class="img-fluid"
                                            src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                                        aria-labelledby="navbarDropdownUserImage">
                                        <h6 class="dropdown-header d-flex align-items-center">
                                            <img class="dropdown-user-img"
                                                src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                                            <div class="dropdown-user-details">
                                                <div class="dropdown-user-details-name">{{ Auth::user()->nama_pegawai }}
                                                </div>
                                                <div class="dropdown-user-details-email">{{ Auth::user()->role }}
                                                </div>
                                        </h6>


                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('password-pegawai.change') }}">
                                            <div class="dropdown-item-icon"><i data-feather="key"></i></div>
                                            Ganti Password
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>



                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>

                </div>

                <div class="col-xl-11">
                    <div class="card mt-4">
                        <div class="card-body p-5">
                            <div class="row align-items-center justify-content-between ml-4">
                                <div class="col-2">
                                    <div class="icons-org-create mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-users icon-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="small">
                                        <div class="h2 text-primary font-weight-300 mb-0">Selamat Datang pada Dashboard!
                                        </div>
                                        <div class="h4 mb-0 mt-2">{{ Auth::user()->nama_pegawai }}</div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr class="m-0">
                        <div class="container">
                            <!-- Wizard card example with navigation-->
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <!-- Wizard navigation-->
                                    <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard"
                                        id="cardTab" role="tablist">
                                        <!-- Wizard navigation item 1-->
                                        <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1"
                                            data-toggle="tab" role="tab" aria-controls="wizard1" aria-selected="true">
                                            <div class="wizard-step-text">
                                                <div class="wizard-step-text-name">Daftar Slip Gaji</div>
                                            </div>
                                        </a>
                                        <!-- Wizard navigation item 2-->
                                        <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab"
                                            role="tab" aria-controls="wizard2" aria-selected="true">
                                            <div class="wizard-step-text">
                                                <div class="wizard-step-text-name">Profil Pegawai</div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="cardTabContent">
                                        <!-- Wizard tab pane item 1-->
                                        <div class="tab-pane py-5 py-xl-1 fade show active" id="wizard1" role="tabpanel"
                                            aria-labelledby="wizard1-tab">
                                            <div class="row justify-content-center">
                                                <div class="datatable">
                                                    <table class="table table-bordered table-hover" id="dataTable"
                                                        width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 30px;">No</th>
                                                                <th>Nama</th>
                                                                <th>Bulan</th>
                                                                <th>Tahun</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($gaji as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration}}</td>

                                                                <td>Slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF</td>
                                                                <td>{{date('F', mktime(0, 0, 0, (int)substr($item->Gaji->bulan_gaji, 5, 2), 10))}}
                                                                </td>
                                                                <td>{{ substr($item->Gaji->bulan_gaji, 0, 4)}}</td>
                                                                <td>
                                                                    <a href="/pegawai/cetak-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                                        class="btn btn-facebook" target='_blank'>
                                                                        <i class="fas fa-print"></i>Print
                                                                    </a>
                                                                    <a href="/pegawai/download-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                                        class="btn btn-google" target='_blank'>
                                                                        <i class="far fa-file-pdf"></i>Download PDF
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Wizard tab pane item 2-->
                                        <div class="tab-pane py-5 py-xl-1 fade" id="wizard2" role="tabpanel"
                                            aria-labelledby="wizard2-tab">
                                            <div class="row justify-content-center">
                                                <div class="col-xxl-6 col-xl-8">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Profile</div>
                                                        <div class="card-body">
                                                            <form>
                                                                <!-- Form Group (username)-->
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="inputUsername">Nama
                                                                        Lengkap</label>
                                                                    <input class="form-control" id="inputUsername"
                                                                        type="text"
                                                                        value="{{ Auth::user()->nama_pegawai }}"
                                                                        disabled />
                                                                </div>
                                                                <!-- Form Row-->
                                                                <div class="form-row">
                                                                    <!-- Form Group (first name)-->
                                                                    <div class="form-group col-md-6">
                                                                        <label class="small mb-1"
                                                                            for="inputFirstName">Pangkat</label>
                                                                        <input class="form-control" id="inputFirstName"
                                                                            type="text"
                                                                            value="{{ Auth::user()->pangkat }}"
                                                                            disabled />
                                                                    </div>
                                                                    <!-- Form Group (last name)-->
                                                                    <div class="form-group col-md-6">
                                                                        <label class="small mb-1"
                                                                            for="inputLastName">Golongan</label>
                                                                        <input class="form-control" id="inputLastName"
                                                                            type="text"
                                                                            value="{{ Auth::user()->golongan }}"
                                                                            disabled />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="small mb-1"
                                                                        for="inputUsername">NIP</label>
                                                                    <input class="form-control" id="inputUsername"
                                                                        type="text"
                                                                        value="{{ Auth::user()->nip_pegawai }}"
                                                                        disabled />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1"
                                                                        for="inputUsername">NPWP</label>
                                                                    <input class="form-control" id="inputUsername"
                                                                        type="text"
                                                                        value="{{ Auth::user()->npwp_pegawai }}"
                                                                        disabled />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="inputUsername">No
                                                                        Telp</label>
                                                                    <input class="form-control" id="inputUsername"
                                                                        type="text" value="{{ Auth::user()->no_telp }}"
                                                                        disabled />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1"
                                                                        for="inputUsername">E-mail</label>
                                                                    <input class="form-control" id="inputUsername"
                                                                        type="text" value="{{ Auth::user()->email }}"
                                                                        disabled />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mb-1" for="inputUsername">Alamat
                                                                        Lengkap</label>
                                                                    <textarea class="form-control" id="inputUsername"
                                                                        type="text" disabled> {{ Auth::user()->alamat }}
                                                                    </textarea>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>




    </main>
</body>


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
