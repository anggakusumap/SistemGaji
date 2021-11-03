@extends('layouts.admindashboard')

@section('content')
{{-- HEADER --}}
<main class="mt-5">
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
                                                style="width: 80px;">Jumlah Bersih</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 100px;">Penerimaan Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gaji->Detailgaji as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->User->nama_pegawai }}</td>
                                            <td>{{ number_format($item->jumlah_kotor) }}</td>
                                            <td>{{ number_format($item->jumlah_potongan) }}</td>
                                            <td>{{ number_format($item->jumlah_bersih_gaji) }}</td>
                                            <td>{{ number_format($item->penerimaan_total) }}</td>
                                            <td>
                                                <a href="" class="btn-xs btn-secondary  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_detail_gaji }}">
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

@forelse ($gaji->Detailgaji as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_detail_gaji }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-italic">Rincian Gaji Pegawai <b id="nama-{{ $item->id_detail_gaji }}"
                        class="nama">{{ $item->User->nama_pegawai }}</b></h5>
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
                                        value="{{ number_format($item->gaji_pokok) ?? '0' }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label for="tunjangan_istrisuami" class="col-sm-5 col-form-label col-form-label-sm">2.
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
                                        value="{{ number_format($item->tunjangan_jabatan_struktural) ?? '0' }}"
                                        readonly>
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
                                        value="{{ number_format($item->tunjangan_jabatan_fungsional) ?? '0' }}"
                                        readonly>
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
                                <label for="jumlah_potongan" class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah
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
                                        id="jumlah_bersih_gaji-{{ $item->id_detail_gaji }}" name="jumlah_bersih_gaji"
                                        value="{{ number_format($item->jumlah_bersih_gaji) ?? '0' }}" readonly>
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
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@empty

@endforelse


@endsection
