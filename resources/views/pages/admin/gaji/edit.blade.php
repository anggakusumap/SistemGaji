@extends('layouts.admindashboard')

@section('content')
{{-- HEADER --}}
<main class="mt-5">


    @if(session('message'))
    <div class="container-fluid">
        <div class="alert alert-success alert-icon" id="alertsukses" role="alert">
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="alert-icon-aside">
                <i class="fas fa-file-excel"></i>
            </div>
            <div class="alert-icon-content">
                <h6 class="alert-heading">Import Success!</h6>
                {{ session('message') }}
            </div>
        </div>
    </div>
    @endif


    <div class="container-fluid">
        <div class="card h-100 mb-4">
            <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                            src="/frontend/src/assets/img/freepik/data-report-pana.svg" style="max-width: 17rem;">
                    </div>
                    <div class="col-xl-8 col-xxl-12">
                        <h2 class="text-primary mb-3" style="font-size: 15pt">Edit Penggajian Pegawai</h2>
                        <hr>
                        <span class="font-weight-500 text-gray">Tahun </span>
                        {{ date('Y', strtotime($gaji->bulan_gaji)) }} ·
                        <span class="font-weight-500 text-gray ml-2">Bulan </span>
                        {{ date('F', strtotime($gaji->bulan_gaji)) }}

                        <p class="font-weight-500 text-gray">Jumlah Pegawai · <span
                                class="font-weight-500 text-primary">{{ $gaji->detailgaji_count }} Orang</span> </p>

                        <p class="small">Petunjuk: Klik button <b>edit</b> untuk melakukan editing pada gaji
                            masing-masing pegawai</p>
                        <div class="row">
                            <div class="col-9">

                            </div>
                            <div class="col-3">
                                <a href="{{ route('gaji.index') }}" class="btn btn-light btn-sm" type="button">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Edit Data</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="card mb-4">

            <div class="card-body">
                <div class="datatable">
                    <form action="{{ route('gaji.update', $gaji->id_gaji_pegawai) }}" method="POST" id="form1"
                        class="d-inline">
                        @csrf
                        @if(session('messageberhasil'))
                        <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                            {{ session('messageberhasil') }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        @if(session('messagehapus'))
                        <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                            {{ session('messagehapus') }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif

                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 10px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 80px;">Jumlah Kotor</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 80px;">Jumlah Potongan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 80px;">Jumlah Bersih</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 80px;">Jumlah Bersih</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    style="width: 100px;">Penerimaan Total</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 100px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($gaji->Detailgaji as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.
                                                </th>

                                                @if ($item->User != null)
                                                <td>{{ $item->User->nama_pegawai }}</td>

                                                @else
                                                <td style="color: red" id="nama_table-{{ $item->id_detail_gaji }}">Data
                                                    Tidak Valid! Edit Data</td>
                                                @endif

                                                <td id="kotor_table-{{ $item->id_detail_gaji }}">
                                                    {{ number_format($item->jumlah_kotor) }}</td>
                                                <td id="potongan_table-{{ $item->id_detail_gaji }}">
                                                    {{ number_format($item->jumlah_potongan) }}</td>
                                                <td id="tukin_table-{{ $item->id_detail_gaji }}">
                                                    {{ number_format($item->tukin_dibayarkan) }}</td>
                                                <td id="bersih_table-{{ $item->id_detail_gaji }}">
                                                    {{ number_format($item->jumlah_bersih_gaji) }}</td>
                                                <td id="total_table-{{ $item->id_detail_gaji }}">
                                                    {{ number_format($item->penerimaan_total) }}</td>
                                                <td>
                                                    <a href="" class="btn-xs btn-secondary  mr-2" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modaledit-{{ $item->id_detail_gaji }}">
                                                        Edit Data
                                                    </a>
                                                    <button class="btn-xs btn-danger"
                                                        id="button_hapus-{{ $item->id_detail_gaji }}"
                                                        onclick="hapusdata({{ $item->id_detail_gaji }})" type="button">
                                                        Hapus
                                                    </button>

                                                </td>
                                            </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
</main>

<div id="gaji">
    @forelse ($gaji->Detailgaji as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_detail_gaji }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-italic">Rincian Gaji Pegawai <b id="nama-{{ $item->id_detail_gaji }}"
                            class="nama">{{ $item->nama }}</b></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="gajibuttonclose-{{ $item->id_detail_gaji }}"><span
                            aria-hidden="true">×</span></button>
                </div>
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
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="gaji_pokok" class="col-sm-5 col-form-label col-form-label-sm">1. Gaji
                                                        Pokok</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="gaji_pokok-{{ $item->id_detail_gaji }}" name="gaji_pokok"
                                                            value="{{ number_format($item->gaji_pokok) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_istrisuami"
                                                        class="col-sm-5 col-form-label col-form-label-sm">2.
                                                        Tunjangan
                                                        Istri/Suami</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_istrisuami-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_istrisuami"
                                                            value="{{ number_format($item->tunjangan_istrisuami) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_anak" class="col-sm-5 col-form-label col-form-label-sm">3.
                                                        Tunjangan
                                                        Anak</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_anak-{{ $item->id_detail_gaji }}" name="tunjangan_anak"
                                                            value="{{ number_format($item->tunjangan_anak) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_jabatan_struktural"
                                                        class="col-sm-5 col-form-label col-form-label-sm">4.
                                                        Tunjangan Jabatan Struktural</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_jabatan_struktural-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_jabatan_struktural"
                                                            value="{{ number_format($item->tunjangan_jabatan_struktural) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_jabatan_fungsional"
                                                        class="col-sm-5 col-form-label col-form-label-sm">5.
                                                        Tunjangan Jabatan Fungsional</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_jabatan_fungsional-{{ $item->id_detail_gaji }}"
                                                            name="tunjangan_jabatan_fungsional"
                                                            value="{{ number_format($item->tunjangan_jabatan_fungsional) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_umum" class="col-sm-5 col-form-label col-form-label-sm">6.
                                                        Tunjangan
                                                        Umum</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_umum-{{ $item->id_detail_gaji }}" name="tunjangan_umum"
                                                            value="{{ number_format($item->tunjangan_umum) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_beras" class="col-sm-5 col-form-label col-form-label-sm">7.
                                                        Tunjangan Beras</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_beras-{{ $item->id_detail_gaji }}" name="tunjangan_beras"
                                                            value="{{ number_format($item->tunjangan_beras) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="tunjangan_pph" class="col-sm-5 col-form-label col-form-label-sm">8.
                                                        Tunjangan
                                                        PPH</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="tunjangan_pph-{{ $item->id_detail_gaji }}" name="tunjangan_pph"
                                                            value="{{ number_format($item->tunjangan_pph) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="pembulatan" class="col-sm-5 col-form-label col-form-label-sm">9.
                                                        Pembulatan</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="pembulatan-{{ $item->id_detail_gaji }}" name="pembulatan"
                                                            value="{{ number_format($item->pembulatan) ?? '0' }}">
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
                                                            value="{{ number_format($item->jumlah_kotor) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="iuran_wajib" class="col-sm-5 col-form-label col-form-label-sm">1. Iuran
                                                        Wajib</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="iuran_wajib-{{ $item->id_detail_gaji }}" name="iuran_wajib"
                                                            value="{{ number_format($item->iuran_wajib) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="bpjs" class="col-sm-5 col-form-label col-form-label-sm"> 2. BPJS</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="bpjs-{{ $item->id_detail_gaji }}" name="bpjs"
                                                            value="{{ number_format($item->bpjs) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="sewa_rumah" class="col-sm-5 col-form-label col-form-label-sm">3. Sewa
                                                        Rumah</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="sewa_rumah-{{ $item->id_detail_gaji }}" name="sewa_rumah"
                                                            value="{{ number_format($item->sewa_rumah) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group row">
                                                    <label for="pph_pasal_21" class="col-sm-5 col-form-label col-form-label-sm"> 4. PPh
                                                        Pasal 21</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator"
                                                            id="pph_pasal_21-{{ $item->id_detail_gaji }}" name="pph_pasal_21"
                                                            value="{{ number_format($item->pph_pasal_21) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
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
                                                            value="{{ number_format($item->jumlah_potongan) ?? '0' }}">
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
                                                            value="{{ number_format($item->jumlah_bersih_gaji) ?? '0' }}">
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
                                                            value="{{ number_format($item->tunjangan_kinerja) ?? '0' }}">
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
                                                            value="{{ number_format($item->jumlah_potongan_lainnya) ?? '0' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-6">
                
                                                @if ($item->User != null)
                                                <div class="form-group row">
                                                    <label for="nama" class="col-sm-5 col-form-label col-form-label-sm"><b>Nama
                                                            Pegawai</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b> </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm" name="nama"
                                                            value="{{ $item->User->nama_pegawai }}" readonly>
                                                        <select class="form-control form-control-sm" style="display: none"
                                                            name="id_user">
                                                            <option value="{{ $item->User->id }}">{{ $item->User->nama_pegawai }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                
                                                @else
                
                                                <div class="form-group row">
                                                    <label for="id_user" class="col-sm-5 col-form-label col-form-label-sm"><b>
                                                            Pegawai</b></label>
                                                    <div class="col-sm-1 text-center">
                                                        <span><b>:</b> </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select class="selectpicker show-menu-arrow show-tick form-control"
                                                            data-dropup-auto="false" data-size="5" data-live-search="true"
                                                            name="id_user" id="namates-{{ $item->id_detail_gaji }}">
                                                            <option>Pilih Pegawai</option>
                                                            @foreach ($pegawai as $items)
                                                            <option value="{{ $items->id }}">{{ $items->nama_pegawai }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                
                
                                                @endif
                
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
                                                            value="{{ number_format($item->penerimaan_total) ?? '0' }}">
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
                                                <div class="col-6">
                                                    <div class="text-right">
                                                        <p class="font-italic small">Jumlah Tunjangan Kinerja (IDR) :Rp. <span id="tunjangankinerjatext-{{ $item->id_detail_gaji }}">{{ number_format($item->tunjangan_kinerja) ?? '0' }}</span></p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="px-2">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_absen_persen" class="col-sm-5 col-form-label col-form-label-sm">1. Absen (%)</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_absen_persen-{{ $item->id_detail_gaji }}" name="potongan_absen_persen"
                                                                value="{{ number_format($item->potongan_absen_persen) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_absen" class="col-sm-5 col-form-label col-form-label-sm">2. Absen (Rp)</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_absen-{{ $item->id_detail_gaji }}" name="potongan_absen"
                                                                value="{{ number_format($item->potongan_absen) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="tunj_setelah_pot_absen"
                                                            class="col-sm-5 col-form-label col-form-label-sm">
                                                            3. Tunjangan Setelah Pot. Absen</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="tunj_setelah_pot_absen-{{ $item->id_detail_gaji }}"
                                                                name="tunj_setelah_pot_absen"
                                                                value="{{ number_format($item->tunj_setelah_pot_absen) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_dana_punia" class="col-sm-5 col-form-label col-form-label-sm">
                                                            4. Dana Punia</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_dana_punia-{{ $item->id_detail_gaji }}" name="potongan_dana_punia"
                                                                value="{{ number_format($item->potongan_dana_punia) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_mushola"
                                                            class="col-sm-5 col-form-label col-form-label-sm">5.
                                                            Mushola</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_mushola-{{ $item->id_detail_gaji }}"
                                                                name="potongan_mushola"
                                                                value="{{ number_format($item->potongan_mushola) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_nasrani"
                                                            class="col-sm-5 col-form-label col-form-label-sm">6.
                                                            Nasrani</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_nasrani-{{ $item->id_detail_gaji }}"
                                                                name="potongan_nasrani"
                                                                value="{{ number_format($item->potongan_nasrani) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_ar" class="col-sm-5 col-form-label col-form-label-sm">7.
                                                            AR</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_ar-{{ $item->id_detail_gaji }}" name="potongan_ar"
                                                                value="{{ number_format($item->potongan_ar) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_bpd" class="col-sm-5 col-form-label col-form-label-sm">8.
                                                            BPD</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_bpd-{{ $item->id_detail_gaji }}" name="potongan_bpd"
                                                                value="{{ number_format($item->potongan_bpd) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_bjb" class="col-sm-5 col-form-label col-form-label-sm">9.
                                                            BJB</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                                id="potongan_bjb-{{ $item->id_detail_gaji }}" name="potongan_bjb"
                                                                value="{{ number_format($item->potongan_bjb) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_cakti_buddhi_bhakti" class="col-sm-5 col-form-label col-form-label-sm">10.
                                                            Cakti Buddhi</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_cakti_buddhi_bhakti-{{ $item->id_detail_gaji }}" name="potongan_cakti_buddhi_bhakti"
                                                                value="{{ number_format($item->potongan_cakti_buddhi_bhakti) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_anak_asuh" class="col-sm-5 col-form-label col-form-label-sm">11.
                                                            Anak Asuh</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_anak_asuh-{{ $item->id_detail_gaji }}" name="potongan_anak_asuh"
                                                                value="{{ number_format($item->potongan_anak_asuh) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_futsal" class="col-sm-5 col-form-label col-form-label-sm">12.
                                                            Futsal</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_futsal-{{ $item->id_detail_gaji }}" name="potongan_futsal"
                                                                value="{{ number_format($item->potongan_futsal) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_umum" class="col-sm-5 col-form-label col-form-label-sm">13.
                                                            Umum</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_umum-{{ $item->id_detail_gaji }}" name="potongan_umum"
                                                                value="{{ number_format($item->potongan_umum) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_paguyuban" class="col-sm-5 col-form-label col-form-label-sm">14.
                                                            Pot. Paguyuban</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_paguyuban-{{ $item->id_detail_gaji }}" name="potongan_paguyuban"
                                                                value="{{ number_format($item->potongan_paguyuban) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_pinjaman_cbb" class="col-sm-5 col-form-label col-form-label-sm">15.
                                                            Pinjaman CBB</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_pinjaman_cbb-{{ $item->id_detail_gaji }}" name="potongan_pinjaman_cbb"
                                                                value="{{ number_format($item->potongan_pinjaman_cbb) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group row">
                                                        <label for="potongan_kop_bali_sedana" class="col-sm-5 col-form-label col-form-label-sm">16.
                                                            KOP Bali Sedana</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_kop_bali_sedana-{{ $item->id_detail_gaji }}" name="potongan_kop_bali_sedana"
                                                                value="{{ number_format($item->potongan_kop_bali_sedana) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            {{-- POTONGAN --}}
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tukin_setelah_potongan2" class="col-sm-4 col-form-label col-form-label-sm">Tukin Setelah Potongan2</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="tukin_setelah_potongan2-{{ $item->id_detail_gaji }}" name="tukin_setelah_potongan2"
                                                                value="{{ number_format($item->tukin_setelah_potongan2) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="potongan_jumlah"
                                                            class="col-sm-4 col-form-label col-form-label-sm"><b>Jumlah Potongan</b></label>
                                                        <div class="col-sm-1 text-center">
                                                            <span><b>:</b></span>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="potongan_jumlah-{{ $item->id_detail_gaji }}"
                                                                name="potongan_jumlah"
                                                                value="{{ number_format($item->potongan_jumlah) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="rapel_tukin" class="col-sm-4 col-form-label col-form-label-sm">Rapel Tukin</label>
                                                        <div class="col-sm-1 text-center">
                                                            <span> : </span>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="rapel_tukin-{{ $item->id_detail_gaji }}" name="rapel_tukin"
                                                                value="{{ number_format($item->rapel_tukin) ?? '0' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <label for="tukin_dibayarkan"
                                                            class="col-sm-4 col-form-label col-form-label-sm"><b>Tukin Dibayarkan</b></label>
                                                        <div class="col-sm-1 text-center">
                                                            <span><b>:</b></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control form-control-sm number-separator"
                                                                id="tukin_dibayarkan-{{ $item->id_detail_gaji }}"
                                                                name="tukin_dibayarkan"
                                                                value="{{ number_format($item->tukin_dibayarkan) ?? '0' }}">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button class="btn btn-sm btn-primary" type="button" onclick="tambahpotongan(event, {{ $item->id_detail_gaji }})">Hitung</button>
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
                        <button class="btn btn-sm btn-primary" type="button" onclick="tambah(event, {{ $item->id_detail_gaji }})">Save changes</button>
                    </div>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</div>

<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Simpan Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">Apakah Data yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" data-dismiss="modal"
                    onclick="simpandata(event, {{ $gaji->id_gaji_pegawai }})">Ya
                    Sudah!</button>
            </div>
        </div>
    </div>
</div>

<script>
    function simpandata(event, id_gaji_pegawai) {
        event.preventDefault()
        var _token = $('#form1').find('input[name="_token"]').val()
        var detailgaji = []

        var datadetail = $('#gaji').children()
        for (let index = 0; index < datadetail.length; index++) {
            var form = $(datadetail[index]).children().children()
            var id = form.find('select[name="id_user"]').val()
            var nama = form.find('select[name="id_user"] option:selected').text()

            var gaji_pokok_element = form.find('input[name="gaji_pokok"]').val()
            var gaji_pokok = gaji_pokok_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var tunjangan_istrisuami_element = form.find('input[name="tunjangan_istrisuami"]').val()
            var tunjangan_istrisuami = tunjangan_istrisuami_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var tunjangan_anak_element = form.find('input[name="tunjangan_anak"]').val()
            var tunjangan_anak = tunjangan_anak_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var tunjangan_jabatan_struktural_element = form.find('input[name="tunjangan_jabatan_struktural"]').val()
            var tunjangan_jabatan_struktural = tunjangan_jabatan_struktural_element.replace(',', '').replace(',', '')
                .replace(',', '').trim()

            var tunjangan_jabatan_fungsional_element = form.find('input[name="tunjangan_jabatan_fungsional"]').val()
            var tunjangan_jabatan_fungsional = tunjangan_jabatan_fungsional_element.replace(',', '').replace(',', '')
                .replace(',', '').trim()

            var tunjangan_umum_element = form.find('input[name="tunjangan_umum"]').val()
            var tunjangan_umum = tunjangan_umum_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var tunjangan_beras_element = form.find('input[name="tunjangan_beras"]').val()
            var tunjangan_beras = tunjangan_beras_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var tunjangan_pph_element = form.find('input[name="tunjangan_pph"]').val()
            var tunjangan_pph = tunjangan_pph_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var pembulatan_element = form.find('input[name="pembulatan"]').val()
            var pembulatan = pembulatan_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var jumlah_kotor_element = form.find('input[name="jumlah_kotor"]').val()
            var jumlah_kotor = jumlah_kotor_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var iuran_wajib_element = form.find('input[name="iuran_wajib"]').val()
            var iuran_wajib = iuran_wajib_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var bpjs_element = form.find('input[name="bpjs"]').val()
            var bpjs = bpjs_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var sewa_rumah_element = form.find('input[name="sewa_rumah"]').val()
            var sewa_rumah = sewa_rumah_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var pph_pasal_21_element = form.find('input[name="pph_pasal_21"]').val()
            var pph_pasal_21 = pph_pasal_21_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var jumlah_potongan_element = form.find('input[name="jumlah_potongan"]').val()
            var jumlah_potongan = jumlah_potongan_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var jumlah_bersih_gaji_element = form.find('input[name="jumlah_bersih_gaji"]').val()
            var jumlah_bersih_gaji = jumlah_bersih_gaji_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var tunjangan_kinerja_element = form.find('input[name="tunjangan_kinerja"]').val()
            var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var jumlah_potongan_lainnya_element = form.find('input[name="jumlah_potongan_lainnya"]').val()
            var jumlah_potongan_lainnya = jumlah_potongan_lainnya_element.replace(',', '').replace(',', '').replace(',',
                '').trim()

            var penerimaan_total_element = form.find('input[name="penerimaan_total"]').val()
            var penerimaan_total = penerimaan_total_element.replace(',', '').replace(',', '').replace(',', '').trim()


            // POTONGAN - POTONGAN ---------------------------------------------------------------------------
            var potongan_absen_element = form.find('input[name="potongan_absen"]').val()
            var potongan_absen = potongan_absen_element.replace(',', '').replace(',', '').replace(',', '').trim()
  
            var potongan_absen_persen = form.find('input[name="potongan_absen_persen"]').val()
           
            var potongan_absen_element = form.find('input[name="potongan_absen"]').val()
            var potongan_absen = potongan_absen_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var tunj_setelah_pot_absen_element = form.find('input[name="tunj_setelah_pot_absen"]').val()
            var tunj_setelah_pot_absen = tunj_setelah_pot_absen_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_dana_punia_element = form.find('input[name="potongan_dana_punia"]').val()
            var potongan_dana_punia = potongan_dana_punia_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_mushola_element = form.find('input[name="potongan_mushola"]').val()
            var potongan_mushola = potongan_mushola_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_nasrani_element = form.find('input[name="potongan_nasrani"]').val()
            var potongan_nasrani = potongan_nasrani_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_ar_element = form.find('input[name="potongan_ar"]').val()
            var potongan_ar = potongan_ar_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_bpd_element = form.find('input[name="potongan_bpd"]').val()
            var potongan_bpd = potongan_bpd_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_bjb_element = form.find('input[name="potongan_bjb"]').val()
            var potongan_bjb = potongan_bjb_element.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_cakti_buddhi_bhakti_el = form.find('input[name="potongan_cakti_buddhi_bhakti"]').val()
            var potongan_cakti_buddhi_bhakti = potongan_cakti_buddhi_bhakti_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_anak_asuh_el = form.find('input[name="potongan_anak_asuh"]').val()
            var potongan_anak_asuh = potongan_anak_asuh_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_futsal_el = form.find('input[name="potongan_futsal"]').val()
            var potongan_futsal = potongan_futsal_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_umum_el = form.find('input[name="potongan_umum"]').val()
            var potongan_umum = potongan_umum_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_paguyuban_el = form.find('input[name="potongan_paguyuban"]').val()
            var potongan_paguyuban = potongan_paguyuban_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_pinjaman_cbb_el = form.find('input[name="potongan_pinjaman_cbb"]').val()
            var potongan_pinjaman_cbb = potongan_pinjaman_cbb_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_kop_bali_sedana_el = form.find('input[name="potongan_kop_bali_sedana"]').val()
            var potongan_kop_bali_sedana = potongan_kop_bali_sedana_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var tukin_setelah_potongan2_el = form.find('input[name="tukin_setelah_potongan2"]').val()
            var tukin_setelah_potongan2 = tukin_setelah_potongan2_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var potongan_jumlah_el = form.find('input[name="potongan_jumlah"]').val()
            var potongan_jumlah = potongan_jumlah_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var rapel_tukin_el = form.find('input[name="rapel_tukin"]').val()
            var rapel_tukin = rapel_tukin_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var tukin_dibayarkan_el = form.find('input[name="tukin_dibayarkan"]').val()
            var tukin_dibayarkan = tukin_dibayarkan_el.replace(',', '').replace(',', '').replace(',', '').trim()

            var obj = {
                id_gaji_pegawai: id_gaji_pegawai,
                id: id, 
                nama: nama,
                gaji_pokok: gaji_pokok,
                tunjangan_istrisuami: tunjangan_istrisuami,
                tunjangan_anak: tunjangan_anak,
                tunjangan_jabatan_struktural: tunjangan_jabatan_struktural,
                tunjangan_jabatan_fungsional: tunjangan_jabatan_fungsional,
                tunjangan_umum: tunjangan_umum,
                tunjangan_beras: tunjangan_beras,
                tunjangan_pph: tunjangan_pph,
                pembulatan: pembulatan,
                jumlah_kotor: jumlah_kotor,
                iuran_wajib: iuran_wajib,
                bpjs: bpjs,
                sewa_rumah: sewa_rumah,
                pph_pasal_21: pph_pasal_21,
                jumlah_potongan: jumlah_potongan,
                jumlah_bersih_gaji: jumlah_bersih_gaji,
                tunjangan_kinerja: tunjangan_kinerja,
                jumlah_potongan_lainnya: jumlah_potongan_lainnya,
                penerimaan_total: penerimaan_total,
                potongan_absen: potongan_absen,
                potongan_absen_persen: potongan_absen_persen,
                tunj_setelah_pot_absen: tunj_setelah_pot_absen,
                potongan_dana_punia: potongan_dana_punia,
                potongan_mushola: potongan_mushola,
                potongan_nasrani: potongan_nasrani,
                potongan_ar: potongan_ar,
                potongan_bpd: potongan_bpd,
                potongan_bjb: potongan_bjb,
                potongan_cakti_buddhi_bhakti: potongan_cakti_buddhi_bhakti,
                potongan_anak_asuh: potongan_anak_asuh,
                potongan_futsal: potongan_futsal,
                potongan_umum: potongan_umum,
                potongan_paguyuban: potongan_paguyuban,
                potongan_pinjaman_cbb: potongan_pinjaman_cbb,
                potongan_kop_bali_sedana: potongan_kop_bali_sedana,
                tukin_setelah_potongan2: tukin_setelah_potongan2,
                potongan_jumlah: potongan_jumlah,
                rapel_tukin: rapel_tukin,
                tukin_dibayarkan: tukin_dibayarkan
            }
            detailgaji.push(obj)
        }
    

        if (id == '' | id == 'Pilih Pegawai') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Data Pegawai yang Tidak Valid!',
            })
        } else {

            var data = {
                _token: _token,
                detailgaji: detailgaji
            }

            console.log(data)
            
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
            $.ajax({
                method: 'put',
                url: '/gaji/' + id_gaji_pegawai,
                data: data,
                beforeSend: function () {
                    swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Data Sedang Diproses...',
                        showConfirmButton: false,
                        onRender: function () {
                            $('.swal2-content').prepend(sweet_loader);
                        }
                    });
                },
                success: function (response) {
                    console.log(response)

                    swal.fire({
                        icon: 'success',
                        html: '<h5>Success!</h5>'
                    });
                    window.location.href = '/gaji'

                },
                error: function (response) {
                    console.log(response)
                    alert(error.responseJSON.message)
                    swal.fire({
                        icon: 'error',
                        html: '<h5>Error!</h5>'
                    });
                }
            });
        }

    }

    function hapusdata(id_detail_gaji) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var table = $('#dataTable').DataTable()
                var row = $(`#button_hapus-${id_detail_gaji}`).parent().parent()
             
                table.row(row).remove().draw();
                $(`#Modaledit-${id_detail_gaji}`).remove()

                var table = $('#dataTable').DataTable()
                Swal.fire(
                    'Deleted!',
                    'Data Gaji Pegawai Telah Terhapus.',
                    'success'
                )
            }
        })
    }

    function tambahpotongan(event, id_detail_gaji){

        var tunjangan_kinerja_element = $(`#tunjangan_kinerja-${id_detail_gaji}`).val()
        var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_absen_element = $(`#potongan_absen-${id_detail_gaji}`).val()
        var potongan_absen = potongan_absen_element.replace(',', '').replace(',', '').replace(',', '').trim()
        
        var tunj_setelah_pot_absen_element = $(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val()
        var tunj_setelah_pot_absen = tunj_setelah_pot_absen_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_dana_punia_element = $(`#potongan_dana_punia-${id_detail_gaji}`).val()
        var potongan_dana_punia = potongan_dana_punia_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_mushola_element = $(`#potongan_mushola-${id_detail_gaji}`).val()
        var potongan_mushola = potongan_mushola_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_nasrani_element = $(`#potongan_nasrani-${id_detail_gaji}`).val()
        var potongan_nasrani = potongan_nasrani_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_ar_element = $(`#potongan_ar-${id_detail_gaji}`).val()
        var potongan_ar = potongan_ar_element.replace(',', '').replace(',', '').replace(',', '').trim()
        
        var potongan_bpd_element = $(`#potongan_bpd-${id_detail_gaji}`).val()
        var potongan_bpd = potongan_bpd_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_bjb_element = $(`#potongan_bjb-${id_detail_gaji}`).val()
        var potongan_bjb = potongan_bjb_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_cakti_buddhi_bhakti_element = $(`#potongan_cakti_buddhi_bhakti-${id_detail_gaji}`).val()
        var potongan_cakti_buddhi_bhakti = potongan_cakti_buddhi_bhakti_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_anak_asuh_element = $(`#potongan_anak_asuh-${id_detail_gaji}`).val()
        var potongan_anak_asuh = potongan_anak_asuh_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_futsal_element = $(`#potongan_futsal-${id_detail_gaji}`).val()
        var potongan_futsal = potongan_futsal_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_umum_element = $(`#potongan_umum-${id_detail_gaji}`).val()
        var potongan_umum = potongan_umum_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_paguyuban_el = $(`#potongan_paguyuban-${id_detail_gaji}`).val()
        var potongan_paguyuban = potongan_paguyuban_el.replace(',', '').replace(',', '').replace(',', '').trim()
    
        var potongan_pinjaman_cbb_element = $(`#potongan_pinjaman_cbb-${id_detail_gaji}`).val()
        var potongan_pinjaman_cbb = potongan_pinjaman_cbb_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_kop_bali_sedana_element = $(`#potongan_kop_bali_sedana-${id_detail_gaji}`).val()
        var potongan_kop_bali_sedana = potongan_kop_bali_sedana_element.replace(',', '').replace(',', '').replace(',', '').trim()

        

        var rapel_tukin_element = $(`#rapel_tukin-${id_detail_gaji}`).val()
        var rapel_tukin = rapel_tukin_element.replace(',', '').replace(',', '').replace(',', '').trim()

        if (potongan_absen == '' | tunj_setelah_pot_absen == '' | potongan_dana_punia == '' | potongan_mushola == '' | potongan_nasrani == '' |
        potongan_ar == '' | potongan_bpd == '' | potongan_bjb == '' | potongan_cakti_buddhi_bhakti == '' | potongan_anak_asuh == '' |
        potongan_futsal == '' | potongan_umum == '' | potongan_pinjaman_cbb == '' | potongan_kop_bali_sedana == '' | rapel_tukin == '' | potongan_paguyuban == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong! Isi dengan 0',
            });
        }else{

            // PERHITUNGAN TUNJANGAN SETELAH POT. ABSEN
            var perhitungan_tunj_setelah_absen = parseInt(tunjangan_kinerja) - parseInt(potongan_absen)
            var tunjangan_setelah_potongan_absen = $(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val(perhitungan_tunj_setelah_absen)
            if (/^[0-9.,]+$/.test($(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val())) {
            $(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val(
                parseFloat($(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val(
                    $(`#tunj_setelah_pot_absen-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#tunj_setelah_pot_absen-${id_detail_gaji}`).val().length - 1)
                );
            }

            // PERHITUNGAN JUMLAH POTONGAN
            var perhitungan_jumlah_potongan = parseInt(potongan_absen) + parseInt(potongan_dana_punia) + parseInt(potongan_mushola) 
                + parseInt(potongan_nasrani) + parseInt(potongan_ar) + parseInt(potongan_bpd) + parseInt(potongan_bjb)
                + parseInt(potongan_cakti_buddhi_bhakti) + parseInt(potongan_anak_asuh) + parseInt(potongan_futsal)
                + parseInt(potongan_umum) + parseInt(potongan_pinjaman_cbb) + parseInt(potongan_kop_bali_sedana) + parseInt(potongan_paguyuban)
            var potongan_jumlah = $(`#potongan_jumlah-${id_detail_gaji}`).val(perhitungan_jumlah_potongan)
            if (/^[0-9.,]+$/.test($(`#potongan_jumlah-${id_detail_gaji}`).val())) {
            $(`#potongan_jumlah-${id_detail_gaji}`).val(
                parseFloat($(`#potongan_jumlah-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#potongan_jumlah-${id_detail_gaji}`).val(
                    $(`#potongan_jumlah-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#potongan_jumlah-${id_detail_gaji}`).val().length - 1)
                );
            }

            // TUKIN SETELAH POTONGAN
            var perhitungan_tukin_setelah_potongan = parseInt(tunjangan_kinerja) - parseInt(perhitungan_jumlah_potongan)
            var tukin_setelah_potongan = $(`#tukin_setelah_potongan2-${id_detail_gaji}`).val(perhitungan_tukin_setelah_potongan)
            if (/^[0-9.,]+$/.test($(`#tukin_setelah_potongan2-${id_detail_gaji}`).val())) {
            $(`#tukin_setelah_potongan2-${id_detail_gaji}`).val(
                parseFloat($(`#tukin_setelah_potongan2-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#tukin_setelah_potongan2-${id_detail_gaji}`).val(
                    $(`#tukin_setelah_potongan2-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#tukin_setelah_potongan2-${id_detail_gaji}`).val().length - 1)
                );
            }

            // TOTAL TUKIN
            var perhitungan_total_tukin = parseInt(rapel_tukin) + parseInt(perhitungan_tukin_setelah_potongan)
            var tukin_dibayarkan = $(`#tukin_dibayarkan-${id_detail_gaji}`).val(perhitungan_total_tukin)
            if (/^[0-9.,]+$/.test($(`#tukin_dibayarkan-${id_detail_gaji}`).val())) {
            $(`#tukin_dibayarkan-${id_detail_gaji}`).val(
                parseFloat($(`#tukin_dibayarkan-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#tukin_dibayarkan-${id_detail_gaji}`).val(
                    $(`#tukin_dibayarkan-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#tukin_dibayarkan-${id_detail_gaji}`).val().length - 1)
                );
            }

            var tukin = $(`#tukin_dibayarkan-${id_detail_gaji}`).val()
            var tukin_table = $(`#tukin_table-${id_detail_gaji}`).html(tukin)

            // // TUNJANGAN KINERJA EDIT GAJI
            // var tunjangan_kinerja_element = $(`#tunjangan_kinerja-${id_detail_gaji}`).val(perhitungan_total_tukin)
            // if (/^[0-9.,]+$/.test($(`#tunjangan_kinerja-${id_detail_gaji}`).val())) {
            // $(`#tunjangan_kinerja-${id_detail_gaji}`).val(
            //     parseFloat($(`#tunjangan_kinerja-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            // );
            // } else {
            //     $(`#tunjangan_kinerja-${id_detail_gaji}`).val(
            //         $(`#tunjangan_kinerja-${id_detail_gaji}`)
            //         .val()
            //         .substring(0, $(`#tunjangan_kinerja-${id_detail_gaji}`).val().length - 1)
            //     );
            // }

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menghitung Potongan Gaji Pegawai'
            })


        }

    }


    function tambah(event, id_detail_gaji) {
        var gaji_pokok_element = $(`#gaji_pokok-${id_detail_gaji}`).val()
        var gaji_pokok = gaji_pokok_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_istrisuami_element = $(`#tunjangan_istrisuami-${id_detail_gaji}`).val()
        var tunjangan_istrisuami = tunjangan_istrisuami_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_anak_element = $(`#tunjangan_anak-${id_detail_gaji}`).val()
        var tunjangan_anak = tunjangan_anak_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_jabatan_struktural_element =  $(`#tunjangan_jabatan_struktural-${id_detail_gaji}`).val()
        var tunjangan_jabatan_struktural = tunjangan_jabatan_struktural_element.replace(',', '').replace(',', '')
            .replace(',', '').trim()

        var tunjangan_jabatan_fungsional_element = $(`#tunjangan_jabatan_fungsional-${id_detail_gaji}`).val()
        var tunjangan_jabatan_fungsional = tunjangan_jabatan_fungsional_element.replace(',', '').replace(',', '')
            .replace(',', '').trim()

        var tunjangan_umum_element = $(`#tunjangan_umum-${id_detail_gaji}`).val()
        var tunjangan_umum = tunjangan_umum_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_beras_element = $(`#tunjangan_beras-${id_detail_gaji}`).val()
        var tunjangan_beras = tunjangan_beras_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_pph_element = $(`#tunjangan_pph-${id_detail_gaji}`).val()
        var tunjangan_pph = tunjangan_pph_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var pembulatan_element = $(`#pembulatan-${id_detail_gaji}`).val()
        var pembulatan = pembulatan_element.replace(',', '').replace(',', '').replace(',', '').trim()

        // POTONGAN
        var iuran_wajib_element = $(`#iuran_wajib-${id_detail_gaji}`).val()
        var iuran_wajib = iuran_wajib_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var bpjs_element = $(`#bpjs-${id_detail_gaji}`).val()
        var bpjs = bpjs_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var sewa_rumah_element =  $(`#sewa_rumah-${id_detail_gaji}`).val()
        var sewa_rumah = sewa_rumah_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var pph_pasal_21_element = $(`#pph_pasal_21-${id_detail_gaji}`).val()
        var pph_pasal_21 = pph_pasal_21_element.replace(',', '').replace(',', '').replace(',', '').trim()

        // PENERIMAAN LAIN LAIN
        var tunjangan_kinerja_element = $(`#tunjangan_kinerja-${id_detail_gaji}`).val()
        var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var penerimaan_lain_lain_el = $(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val()
        var jumlah_potongan_lainnya = penerimaan_lain_lain_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var nama = $(`#namates-${id_detail_gaji} option:selected`).text().trim()
          
        if (gaji_pokok == '' | tunjangan_istrisuami == '' | tunjangan_anak == '' | tunjangan_jabatan_struktural == '' | tunjangan_jabatan_fungsional == '' | tunjangan_umum == '' |
        tunjangan_beras == '' | tunjangan_pph == '' | pembulatan == '' | jumlah_kotor == '' | iuran_wajib =='' |
        bpjs == '' | sewa_rumah == '' | pph_pasal_21 == '' | jumlah_potongan == '' | jumlah_bersih_gaji == '' | tunjangan_kinerja == '' |
        jumlah_potongan_lainnya == '' | penerimaan_total == '' ){
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong! Isi dengan 0',
            });
        }else if(nama == 'Pilih Pegawai'){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memilih Pegawai',
            });
        }else{

            
            var tunjangankinerjatext = $(`#tunjangankinerjatext-${id_detail_gaji}`).html(tunjangan_kinerja)

            var nama_table = $(`#nama_table-${id_detail_gaji}`).html(nama).css({
                'color': 'green'
            });

            var valid = $(`#valid-${id_detail_gaji}`).html('Data Telah Diperbauri').css({
                'color': 'green'
            });
            // PERHITUNGAN KOTOR
            var perhitungan_kotor = parseInt(gaji_pokok) + parseInt(tunjangan_istrisuami) + parseInt(tunjangan_anak) + parseInt(tunjangan_jabatan_struktural) + 
                                            parseInt(tunjangan_jabatan_fungsional) + parseInt(tunjangan_umum) + 
                                            parseInt(tunjangan_beras) + parseInt(tunjangan_pph) + parseInt(pembulatan)
            var jumlah_kotor = $(`#jumlah_kotor-${id_detail_gaji}`).val(perhitungan_kotor)
            if (/^[0-9.,]+$/.test($(`#jumlah_kotor-${id_detail_gaji}`).val())) {
            $(`#jumlah_kotor-${id_detail_gaji}`).val(
                parseFloat($(`#jumlah_kotor-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#jumlah_kotor-${id_detail_gaji}`).val(
                    $(`#jumlah_kotor-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#jumlah_kotor-${id_detail_gaji}`).val().length - 1)
                );
            }

            // PERHITUNGAN POTONGAN
            var perhitungan_potongan = parseInt(iuran_wajib) + parseInt(bpjs) + parseInt(sewa_rumah) + parseInt(pph_pasal_21)
            var jumlah_potongan = $(`#jumlah_potongan-${id_detail_gaji}`).val(perhitungan_potongan)
            if (/^[0-9.,]+$/.test($(`#jumlah_potongan-${id_detail_gaji}`).val())) {
            $(`#jumlah_potongan-${id_detail_gaji}`).val(
                parseFloat($(`#jumlah_potongan-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#jumlah_potongan-${id_detail_gaji}`).val(
                    $(`#jumlah_potongan-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#jumlah_potongan-${id_detail_gaji}`).val().length - 1)
                );
            }

            // PERHITUNGAN BERSIH
            var perhitungan_bersih = parseInt(perhitungan_kotor) - parseInt(perhitungan_potongan)
            var jumlah_bersih_gaji = $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val(perhitungan_bersih)

            if (/^[0-9.,]+$/.test($(`#jumlah_bersih_gaji-${id_detail_gaji}`).val())) {
            $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val(
                parseFloat($(`#jumlah_bersih_gaji-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val(
                    $(`#jumlah_bersih_gaji-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val().length - 1)
                );
            }

            // PERHITUNGAN PENERIMAAN LAIN LAIN
            // var perhitungan_penerimaan_lain_lain = parseInt(sewa_rumah) + parseInt(perhitungan_potongan) + parseInt(perhitungan_bersih)
            // var penerimaan_lain_lain = $(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val(perhitungan_penerimaan_lain_lain)
            // if (/^[0-9.,]+$/.test($(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val())) {
            // $(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val(
            //     parseFloat($(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            // );
            // } else {
            //     $(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val(
            //         $(`#jumlah_potongan_lainnya-${id_detail_gaji}`)
            //         .val()
            //         .substring(0, $(`#jumlah_potongan_lainnya-${id_detail_gaji}`).val().length - 1)
            //     );
            // }

            // PENERIMAAN TOTAL
            var perhitungan_grand = parseInt(perhitungan_bersih) + parseInt(tunjangan_kinerja) + parseInt(jumlah_potongan_lainnya)
            var penerimaan_total = $(`#penerimaan_total-${id_detail_gaji}`).val(perhitungan_grand)
            if (/^[0-9.,]+$/.test($(`#penerimaan_total-${id_detail_gaji}`).val())) {
            $(`#penerimaan_total-${id_detail_gaji}`).val(
                parseFloat($(`#penerimaan_total-${id_detail_gaji}`).val().replace(/,/g, '')).toLocaleString('en')
            );
            } else {
                $(`#penerimaan_total-${id_detail_gaji}`).val(
                    $(`#penerimaan_total-${id_detail_gaji}`)
                    .val()
                    .substring(0, $(`#penerimaan_total-${id_detail_gaji}`).val().length - 1)
                );
            }

            $(`#gajibuttonclose-${id_detail_gaji}`).click();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Memvalidasi Data Pegawai'
            })

            var jumlah_kotor_1 = $(`#jumlah_kotor-${id_detail_gaji}`).val()
            var kotor_table = $(`#kotor_table-${id_detail_gaji}`).html(jumlah_kotor_1)

            var jumlah_potongan_1 = $(`#jumlah_potongan-${id_detail_gaji}`).val()
            var potongan_table = $(`#potongan_table-${id_detail_gaji}`).html(jumlah_potongan_1)

            var jumlah_bersih_gaji_1 = $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val()
            var bersih_table = $(`#bersih_table-${id_detail_gaji}`).html(jumlah_bersih_gaji_1)

            var penerimaan_total_1 = $(`#penerimaan_total-${id_detail_gaji}`).val()
            var total_table = $(`#total_table-${id_detail_gaji}`).html(penerimaan_total_1)
        }   
    }


    $(document).on('input', '.number-separator', function (e) {
        if (/^[0-9.,]+$/.test($(this).val())) {
            $(this).val(
                parseFloat($(this).val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $(this).val(
                $(this)
                .val()
                .substring(0, $(this).val().length - 1)
            );
        }
    });

    $(document).ready(function () {

        window.setTimeout(function () {
            $("#alertsukses").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 8000);

    });

</script>


@endsection
