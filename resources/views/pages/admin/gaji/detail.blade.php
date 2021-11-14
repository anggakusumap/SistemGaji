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
                        <h2 class="text-primary mb-3" style="font-size: 12pt">Detail Data Gaji Pegawai</h2>
                        <hr>
                        <span class="font-weight-500 text-gray">Tahun </span>
                        {{ date('Y', strtotime($gaji->bulan_gaji)) }} ·
                        <span class="font-weight-500 text-gray ml-2">Bulan </span>
                        {{ date('F', strtotime($gaji->bulan_gaji)) }} ·
                        <span class="font-weight-500 text-gray ml-2">Status Penerimaan </span>
                        {{ $gaji->status_penerimaan }}

                        <p class="font-weight-500 text-gray">Jumlah Pegawai · <span
                                class="font-weight-500 text-primary">{{ $gaji->detailgaji_count }} Orang</span> </p>

                                
                        <p class="font-weight-500 text-gray">Total Penerimaan Keseluruhan · <span
                            class="font-weight-500 text-primary">Rp. {{ number_format($sum,2,',','.') }}</span> </p>
                        <p class="small">Petunjuk: Klik button <b>detail</b> untuk melihat detail gaji
                            masing-masing
                            pegawai</p>
                        <div class="row">
                            <div class="col-10">

                            </div>
                            <div class="col-2">
                                <a href="{{ route('gaji.index') }}" class="btn btn-sm btn-light text-primary"
                                    type="button">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="card mb-4">

            <div class="card-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
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
                                                style="width: 80px;">Tukin Dibayarkan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 80px;">Jumlah Bersih</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 100px;">Penerimaan Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gaji->Detailgaji as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            @if ($item->User == '')
                                                <td style="color: red" class="small">Pegawai Tidak Ditemukan!! Edit Data</td>
                                            @else
                                                <td>{{ $item->User->nama_pegawai }}</td>
                                            @endif
                                            <td>{{ number_format($item->jumlah_kotor) }}</td>
                                            <td>{{ number_format($item->jumlah_potongan) }}</td>
                                            <td>{{ number_format($item->tukin_dibayarkan) }}</td>
                                            <td>{{ number_format($item->jumlah_bersih_gaji) }}</td>
                                            <td>{{ number_format($item->penerimaan_total) }}</td>
                                            <td>
                                                <a href="{{ route('gajishowedit', $item->id_detail_gaji) }}" class="btn-xs btn-secondary  mr-2" type="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>

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
    </div>
</main>

{{-- @forelse ($gaji->Detailgaji as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_detail_gaji }}" tabindex="-1" role="dialog"
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
                                                        value="{{ number_format($item->gaji_pokok) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_istrisuami) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_anak) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_jabatan_struktural) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_jabatan_fungsional) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_umum) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_beras) ?? '0' }}" readonly>
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
                                                        value="{{ number_format($item->tunjangan_pph) ?? '0' }}" readonly>
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
                                                <label for="iuran_wajib" class="col-sm-5 col-form-label col-form-label-sm">1. Iuran
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
                                                <label for="bpjs" class="col-sm-5 col-form-label col-form-label-sm"> 2. BPJS</label>
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
                                                <label for="sewa_rumah" class="col-sm-5 col-form-label col-form-label-sm">3. Sewa
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
                                                <label for="pph_pasal_21" class="col-sm-5 col-form-label col-form-label-sm"> 4. PPh
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
                                                    <label for="potongan_absen_persen" class="col-sm-5 col-form-label col-form-label-sm">1. Absen (%)</label>
                                                    <div class="col-sm-1 text-center">
                                                        <span> : </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control form-control-sm number-separator tes"
                                                            id="potongan_absen_persen-{{ $item->id_detail_gaji }}" name="potongan_absen_persen"
                                                            value="{{ number_format($item->potongan_absen_persen) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_absen) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->tunj_setelah_pot_absen) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_dana_punia) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_mushola) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_nasrani) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_ar) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_bpd) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_bjb) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_cakti_buddhi_bhakti) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_anak_asuh) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_futsal) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_umum) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_paguyuban) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_pinjaman_cbb) ?? '0' }}" readonly>
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
                                                            value="{{ number_format($item->potongan_kop_bali_sedana) ?? '0' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
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

@endforelse --}}


<script>
     $(document).ready(function () {

        window.setTimeout(function () {
            $("#alertsukses").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 8000);

    });
</script>

@endsection
