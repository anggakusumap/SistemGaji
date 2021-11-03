<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Gaji User</title>
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
                                    <span class="small mr-4 text-muted"> Hello,
                                        <span>{{ Auth::user()->nama_pegawai }}</span></span>

                                        @if (Auth::user()->jenis_kelamin == 'Laki-Laki')
                                        <a class="btn btn-lg btn-icon btn-transparent-dark dropdown-toggle"
                                            id="navbarDropdownUserImage" href="javascript:void(0);" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                                class="img-fluid" style="background-color: white"
                                                src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                                        </a>
                                        @else
                                        <a class="btn btn-lg btn-icon btn-transparent-dark dropdown-toggle"
                                            id="navbarDropdownUserImage" href="javascript:void(0);" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                                class="img-fluid" style="background-color: white"
                                                src="/frontend/src/assets/img/freepik/profiles/profile-5.png" />
                                        </a>
                                            
                                        @endif
                                   
                                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                                        aria-labelledby="navbarDropdownUserImage">
                                        <h6 class="dropdown-header d-flex align-items-center">
                                            @if (Auth::user()->jenis_kelamin == 'Laki-Laki')
                                            <img class="dropdown-user-img"
                                            src="/frontend/src/assets/img/freepik/profiles/profile-1.png" />
                                            @else
                                            <img class="dropdown-user-img"
                                            src="/frontend/src/assets/img/freepik/profiles/profile-5.png" />
                                            @endif

                                        
                                            <div class="dropdown-user-details">
                                                <div class="dropdown-user-details-name">{{ Auth::user()->nama_pegawai }}
                                                </div>
                                                <div class="dropdown-user-details-email">Role {{ Auth::user()->role }}
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
                                        <div class="h5 mb-0 mt-2">Nama Pegawai: {{ Auth::user()->nama_pegawai }}</div>
                                        <div class="h6">Pangkat: {{ Auth::user()->pangkat }}, Golongan: {{ Auth::user()->golongan }}</div>
                                        
                                        <div class="small text-muted mt-3 text-right">
                                            Petunjuk: Klik button print untuk mencetak slip gaji
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="card">

                        </div>
                        <div class="card-body mr-5 ml-5">
                            <div class="row justify-content-center">
                                <div class="datatable">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                        cellspacing="0">
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
                                                <td>{{ $loop->iteration}}.</td>

                                                <td>Slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF</td>
                                                <td>{{date('F', mktime(0, 0, 0, (int)substr($item->Gaji->bulan_gaji, 5, 2), 10))}}
                                                </td>
                                                <td>{{ substr($item->Gaji->bulan_gaji, 0, 4)}}</td>
                                                <td>
                                                    <a href="/pegawai/cetak-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                        class="btn btn-xs btn-facebook" target='_blank'>
                                                        <i class="fas fa-print"></i>Print
                                                    </a>
                                                    <a href="/pegawai/download-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                        class="btn btn-xs btn-google" target='_blank'>
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
                    </div>
                </div>
                <div class="simple-footer text-muted text-right mt-4">
                    Copyright &copy; 2021 Aplikasi Penggajian KPP Pratama Gianyar
                </div>
            </div>
            
        </div>
        
        {{-- <div class="h6 text-muted">
            Aplikasi
        </div> --}}
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
