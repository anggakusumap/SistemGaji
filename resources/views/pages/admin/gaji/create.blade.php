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
                        <h2 class="text-primary mb-3" style="font-size: 15pt">Tambah Penggajian Pegawai</h2>
                        <hr>
                        <span class="font-weight-500 text-gray">Tahun </span>
                        {{ date('Y', strtotime($gaji->bulan_gaji)) }} ·
                        <span class="font-weight-500 text-gray ml-2">Bulan </span>
                        {{ date('F', strtotime($gaji->bulan_gaji)) }}

                        <p class="font-weight-500 text-gray">Jumlah Pegawai · <span
                                class="font-weight-500 text-primary">{{ $gaji->detailgaji_count }} Orang</span> </p>

                        <p class="small">Petunjuk: Klik button <b>edit</b> untuk melakukan editing pada gaji
                            masing-masing
                            pegawai</p>
                        <div class="row">
                            <div class="col-10">

                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan Data</button>
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
                                                    style="width: 100px;">Penerimaan Total</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 100px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($gaji->Detailgaji as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>

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
                                                    <button class="btn-xs btn-danger" id="button_hapus-{{ $item->id_detail_gaji }}" onclick="hapusdata({{ $item->id_detail_gaji }})" type="button">
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
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
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

                        {{-- POTONGAN --}}
                        <hr>
                        <p class="font-italic small">Potongan-potongan :</p>
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

                        {{-- PENERIMAAN TOTAL --}}
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
                                            <option value="{{ $item->User->id }}">Pilih Pegawai</option>
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
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="tambah(event, {{ $item->id_detail_gaji }})"
                        data-dismiss="modal">Save changes</button></div>

            </div>
        </div>
        </form>
    </div>
    @empty

    @endforelse
    </form>
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
            // var nama = form.find('input[name="nama"]').val()
            var id = form.find('select[name="id_user"]').val()

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


            detailgaji.push({
                id_gaji_pegawai: id_gaji_pegawai,
                id: id,
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
                penerimaan_total: penerimaan_total
            })

        }

        if (id == '' | id == 'Pilih Pegawai') {
            // alert('Terdapat Data Pegawai Tidak Valid, Silahkan di Edit Terlebih Dahulu')
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
                            // there will only ever be one sweet alert open.
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
            console.log(row)

            console.log(table)
            table.row(row).remove().draw();
            modal = $(`#Modaledit-${id_detail_gaji}`).remove()

            var table = $('#dataTable').DataTable()
            Swal.fire(
            'Deleted!',
            'Data Gaji Pegawai Telah Terhapus.',
            'success'
            )
        }
        })
        
      
    }

    function tambah(event, id_detail_gaji) {
        var jumlah_kotor = $(`#jumlah_kotor-${id_detail_gaji}`).val()
        var kotor_table = $(`#kotor_table-${id_detail_gaji}`).html(jumlah_kotor)

        var jumlah_potongan = $(`#jumlah_potongan-${id_detail_gaji}`).val()
        var potongan_table = $(`#potongan_table-${id_detail_gaji}`).html(jumlah_potongan)

        var jumlah_bersih_gaji = $(`#jumlah_bersih_gaji-${id_detail_gaji}`).val()
        var bersih_table = $(`#bersih_table-${id_detail_gaji}`).html(jumlah_bersih_gaji)

        var penerimaan_total = $(`#penerimaan_total-${id_detail_gaji}`).val()
        var total_table = $(`#total_table-${id_detail_gaji}`).html(penerimaan_total)

        var nama = $(`#namates-${id_detail_gaji} option:selected`).text().trim()
        var nama_table = $(`#nama_table-${id_detail_gaji}`).html(nama).css({
            'color': 'green'
        });

        var valid = $(`#valid-${id_detail_gaji}`).html('Data Telah Diperbauri').css({
            'color': 'green'
        });
        
        



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
</script>


@endsection
