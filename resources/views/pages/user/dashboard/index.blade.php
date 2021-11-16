<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Gaji Pegawai</title>
    <link href="{{ url('frontend/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}" />
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
                            <img class="img-fluid px-xl-4 " style="width: 7rem;"
                                src="/logoputih.png"> <i class="text-muted">Aplikasi Petikan Gaji</i>
                        </div>
                        <div class="col-6 text-right">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown no-caret mr-4 dropdown-user">
                                    <span class="small mr-4 text-muted"> Hello,
                                        <span>{{ Auth::user()->nama_pegawai }}</span></span>

                                   
                                    <a class="btn btn-lg btn-icon btn-transparent-dark dropdown-toggle"
                                        id="navbarDropdownUserImage" href="javascript:void(0);" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                            class="img-fluid" style="background-color: white"
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
                                                <div class="dropdown-user-details-email">ROLE {{ Auth::user()->role }}
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
                                        <div>Pangkat: {{ Auth::user()->pangkat }}, Golongan:
                                            {{ Auth::user()->golongan }}</div>
                                        <div>Grade: {{ Auth::user()->Grade->nama_grade }}</div>
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
                                                    <a href="" class="btn btn-info btn-xs" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modaldetail-{{ $item->id_detail_gaji }}">
                                                        <i class="fas fa-eye mr-1"></i> Detail
                                                    </a>
                                                    <a href="/pegawai/cetak-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                        class="btn btn-xs btn-facebook" target='_blank' rel="noopener noreferrer">
                                                        <i class="fas fa-print mr-1"></i>Print
                                                    </a>
                                                    <a href="/pegawai/download-slip/slip-gaji-{{ $item->Gaji->bulan_gaji }}.PDF"
                                                        class="btn btn-xs btn-google" target='_blank' el="noopener noreferrer">
                                                        <i class="far fa-file-pdf mr-1"></i>Download PDF
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
                    Copyright &copy; 2021 Aplikasi Petikan Gaji KPP Pratama Gianyar
                </div>
            </div>

        </div>
    </main>

    @forelse ($gaji as $item)
    <div class="modal fade" id="Modaldetail-{{ $item->id_detail_gaji }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="overview-tab" href="#overview-{{ $item->id_detail_gaji }}" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Data Gaji Utama</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="example-tab" href="#example-{{ $item->id_detail_gaji }}" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Potongan - Potongan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="cardTabContent">
                                <div class="tab-pane fade show active" id="overview-{{ $item->id_detail_gaji }}" role="tabpanel" aria-labelledby="overview-tab-{{ $item->id_detail_gaji }}">
                                    <div class="px-2">
                                        <p class="font-italic small">Gaji Pegawai Bulan {{date('F', mktime(0, 0, 0, (int)substr($item->Gaji->bulan_gaji, 5, 2), 10))}}, tahun {{ substr($item->Gaji->bulan_gaji, 0, 4)}}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="gaji_pokok" class="col-sm-5 col-form-label col-form-label-sm"> Gaji
                                                        Pokok</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="gaji_pokok-{{ $item->id_detail_gaji }}" name="gaji_pokok"
                                                            value="{{ number_format($item->gaji_pokok) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_istrisuami"
                                                        class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan
                                                        Istri/Suami</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_istrisuami-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_istrisuami"
                                                            value="{{ number_format($item->tunjangan_istrisuami) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_anak" class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan
                                                        Anak</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_anak-{{ $item->id_detail_gaji }}" name="tunjangan_anak"
                                                            value="{{ number_format($item->tunjangan_anak) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_jabatan_struktural"
                                                        class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan Jabatan Struktural</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_jabatan_struktural-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_jabatan_struktural"
                                                            value="{{ number_format($item->tunjangan_jabatan_struktural) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_jabatan_fungsional"
                                                        class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan Jabatan Fungsional</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_jabatan_fungsional-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_jabatan_fungsional"
                                                            value="{{ number_format($item->tunjangan_jabatan_fungsional) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_umum" class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan
                                                        Umum</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_umum-{{ $item->id_detail_gaji }}" name="tunjangan_umum"
                                                            value="{{ number_format($item->tunjangan_umum) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_beras" class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan Beras</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_beras-{{ $item->id_detail_gaji }}" name="tunjangan_beras"
                                                            value="{{ number_format($item->tunjangan_beras) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_pph" class="col-sm-5 col-form-label col-form-label-sm">
                                                        Tunjangan
                                                        PPH</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_pph-{{ $item->id_detail_gaji }}" name="tunjangan_pph"
                                                            value="{{ number_format($item->tunjangan_pph) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="pembulatan" class="col-sm-5 col-form-label col-form-label-sm">
                                                        Pembulatan</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="pembulatan-{{ $item->id_detail_gaji }}" name="pembulatan"
                                                            value="{{ number_format($item->pembulatan) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="jumlah_kotor" class="col-sm-5 col-form-label col-form-label-sm">
                                                        <b>jumlah
                                                            Kotor</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> <b>:</b> </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text"
                                                            class="form-control form-control-sm number-separator jumlah_kotor"
                                                            id="jumlah_kotor-{{ $item->id_detail_gaji }}" name="jumlah_kotor"
                                                            value="{{ number_format($item->jumlah_kotor) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="iuran_wajib" class="col-sm-5 col-form-label col-form-label-sm">Iuran
                                                        Wajib</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="iuran_wajib-{{ $item->id_detail_gaji }}" name="iuran_wajib"
                                                            value="{{ number_format($item->iuran_wajib) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="bpjs" class="col-sm-5 col-form-label col-form-label-sm">BPJS</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="bpjs-{{ $item->id_detail_gaji }}" name="bpjs"
                                                            value="{{ number_format($item->bpjs) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="sewa_rumah" class="col-sm-5 col-form-label col-form-label-sm">Sewa
                                                        Rumah</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="sewa_rumah-{{ $item->id_detail_gaji }}" name="sewa_rumah"
                                                            value="{{ number_format($item->sewa_rumah) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="pph_pasal_21" class="col-sm-5 col-form-label col-form-label-sm">PPh
                                                        Pasal 21</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="pph_pasal_21-{{ $item->id_detail_gaji }}" name="pph_pasal_21"
                                                            value="{{ number_format($item->pph_pasal_21) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            @forelse ($item->Detailpotonganutama as $tes)
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label col-form-label-sm">{{ $tes->nama_potongan_utama }}</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                value="{{ number_format($tes->jumlah_potongan_utama) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="jumlah_potongan"
                                                        class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah
                                                            Potongan</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="jumlah_potongan-{{ $item->id_detail_gaji }}" name="jumlah_potongan"
                                                            value="{{ number_format($item->jumlah_potongan) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="jumlah_bersih_gaji"
                                                        class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah Bersih</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b></span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="jumlah_bersih_gaji-{{ $item->id_detail_gaji }}"
                                                            name="jumlah_bersih_gaji"
                                                            value="{{ number_format($item->jumlah_bersih_gaji) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_kinerja"
                                                        class="col-sm-5 col-form-label col-form-label-sm">Penerimaan Tunjangan
                                                        Kinerja</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="tunjangan_kinerja-{{ $item->id_detail_gaji }}" name="tunjangan_kinerja"
                                                            value="{{ number_format($item->tunjangan_kinerja) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="jumlah_potongan_lainnya"
                                                        class="col-sm-5 col-form-label col-form-label-sm">Penerimaan Lain-Lain</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="jumlah_potongan_lainnya-{{ $item->id_detail_gaji }}"
                                                            name="jumlah_potongan_lainnya"
                                                            value="{{ number_format($item->jumlah_potongan_lainnya) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label col-form-label-sm"><b>Nama
                                                            Pegawai</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b> </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" name="nama"
                                                            value="{{ $item->User->nama_pegawai }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="penerimaan_total"
                                                        class="col-sm-5 col-form-label col-form-label-sm"><b>Penerimaan
                                                            Total</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b> </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="penerimaan_total-{{ $item->id_detail_gaji }}" name="penerimaan_total"
                                                            value="{{ number_format($item->penerimaan_total) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="example-{{ $item->id_detail_gaji }}" role="tabpanel" aria-labelledby="example-tab-{{ $item->id_detail_gaji }}">
                                    <div class="px-2">    
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="text-left">
                                                    <p class="font-italic small">Potongan-potongan :</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_absen_persen" class="col-sm-5 col-form-label col-form-label-sm">Absen (%)</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_absen_persen-{{ $item->id_detail_gaji }}" name="potongan_absen_persen"
                                                                value="{{ number_format($item->potongan_absen_persen) ?? '0' }} %" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_absen" class="col-sm-5 col-form-label col-form-label-sm">Absen (Rp)</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_absen-{{ $item->id_detail_gaji }}" name="potongan_absen"
                                                                value="{{ number_format($item->potongan_absen) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="tunj_setelah_pot_absen"
                                                            class="col-sm-5 col-form-label col-form-label-sm">
                                                            Tunjangan Setelah Pot. Absen</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="tunj_setelah_pot_absen-{{ $item->id_detail_gaji }}"
                                                                name="tunj_setelah_pot_absen"
                                                                value="{{ number_format($item->tunj_setelah_pot_absen) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_dana_punia" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Dana Punia</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_dana_punia-{{ $item->id_detail_gaji }}" name="potongan_dana_punia"
                                                                value="{{ number_format($item->potongan_dana_punia) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_mushola"
                                                            class="col-sm-5 col-form-label col-form-label-sm">
                                                            Mushola</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_mushola-{{ $item->id_detail_gaji }}"
                                                                name="potongan_mushola"
                                                                value="{{ number_format($item->potongan_mushola) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_nasrani"
                                                            class="col-sm-5 col-form-label col-form-label-sm">
                                                            Nasrani</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_nasrani-{{ $item->id_detail_gaji }}"
                                                                name="potongan_nasrani"
                                                                value="{{ number_format($item->potongan_nasrani) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_ar" class="col-sm-5 col-form-label col-form-label-sm">
                                                            AR</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_ar-{{ $item->id_detail_gaji }}" name="potongan_ar"
                                                                value="{{ number_format($item->potongan_ar) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_bpd" class="col-sm-5 col-form-label col-form-label-sm">
                                                            BPD</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_bpd-{{ $item->id_detail_gaji }}" name="potongan_bpd"
                                                                value="{{ number_format($item->potongan_bpd) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_bjb" class="col-sm-5 col-form-label col-form-label-sm">
                                                            BJB</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_bjb-{{ $item->id_detail_gaji }}" name="potongan_bjb"
                                                                value="{{ number_format($item->potongan_bjb) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_cakti_buddhi_bhakti" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Cakti Buddhi</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_cakti_buddhi_bhakti-{{ $item->id_detail_gaji }}" name="potongan_cakti_buddhi_bhakti"
                                                                value="{{ number_format($item->potongan_cakti_buddhi_bhakti) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_anak_asuh" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Anak Asuh</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_anak_asuh-{{ $item->id_detail_gaji }}" name="potongan_anak_asuh"
                                                                value="{{ number_format($item->potongan_anak_asuh) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_futsal" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Futsal</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_futsal-{{ $item->id_detail_gaji }}" name="potongan_futsal"
                                                                value="{{ number_format($item->potongan_futsal) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_umum" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Umum</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_umum-{{ $item->id_detail_gaji }}" name="potongan_umum"
                                                                value="{{ number_format($item->potongan_umum) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_paguyuban" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Pot. Paguyuban</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_paguyuban-{{ $item->id_detail_gaji }}" name="potongan_paguyuban"
                                                                value="{{ number_format($item->potongan_paguyuban) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_pinjaman_cbb" class="col-sm-5 col-form-label col-form-label-sm">
                                                            Pinjaman CBB</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_pinjaman_cbb-{{ $item->id_detail_gaji }}" name="potongan_pinjaman_cbb"
                                                                value="{{ number_format($item->potongan_pinjaman_cbb) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_kop_bali_sedana" class="col-sm-5 col-form-label col-form-label-sm">
                                                            KOP Bali Sedana</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_kop_bali_sedana-{{ $item->id_detail_gaji }}" name="potongan_kop_bali_sedana"
                                                                value="{{ number_format($item->potongan_kop_bali_sedana) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                @forelse ($item->Detailpotongantukin as $tes)
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label col-form-label-sm">{{ $tes->nama_potongan_tukin }}</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm"
                                                                value="{{ number_format($tes->jumlah_potongan_tukin) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            @empty
                                                
                                            @endforelse
                                       
                                            </div>

                                           
                                               
                    
                                            {{-- POTONGAN --}}
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tukin_setelah_potongan2" class="col-sm-5 col-form-label col-form-label-sm">Tukin Setelah Potongan2</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="tukin_setelah_potongan2-{{ $item->id_detail_gaji }}" name="tukin_setelah_potongan2"
                                                                value="{{ number_format($item->tukin_setelah_potongan2) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="potongan_jumlah"
                                                            class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah Potongan</b></label>
                                                        <div class="col-sm-1 text-center">
                                                            <span><b>:</b></span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_jumlah-{{ $item->id_detail_gaji }}"
                                                                name="potongan_jumlah"
                                                                value="{{ number_format($item->potongan_jumlah) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="rapel_tukin" class="col-sm-5 col-form-label col-form-label-sm">Rapel Tukin</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="rapel_tukin-{{ $item->id_detail_gaji }}" name="rapel_tukin"
                                                                value="{{ number_format($item->rapel_tukin) ?? '0' }}" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tukin_dibayarkan"
                                                            class="col-sm-5 col-form-label col-form-label-sm"><b>Tukin Dibayarkan</b></label>
                                                        <div class="col-sm-1 text-center">
                                                            <span><b>:</b></span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="tukin_dibayarkan-{{ $item->id_detail_gaji }}"
                                                                name="tukin_dibayarkan"
                                                                value="{{ number_format($item->tukin_dibayarkan) ?? '0' }}" readonly>
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
                    <div class="card-footer small text-right">
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>

    @empty

    @endforelse
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
