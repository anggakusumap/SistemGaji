@extends('layouts.admindashboard')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-user"></i></div>
                            @if ($item->User == '')
                            Edit Data Gaji Pegawai (Pilih Pegawai Terlebih Dahulu) {{ $item->nama }}
                            @else
                            Edit Data Gaji Pegawai {{ $item->User->nama_pegawai }}
                            @endif

                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('gaji.show', $item->Gaji->id_gaji_pegawai) }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mr-3 mb-5">
        <form action="{{ route('gajishowupdate', $item->id_detail_gaji) }}" method="POST" id="form1" class="d-inline">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                                aria-controls="overview" aria-selected="true">Data Gaji Utama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab"
                                aria-controls="example" aria-selected="false">Potongan - Potongan</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel"
                            aria-labelledby="overview-tab">
                            <div class="px-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="gaji_pokok" class="col-sm-5 col-form-label col-form-label-sm">1.
                                                Gaji
                                                Pokok</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="gaji_pokok" name="gaji_pokok"
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
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_istrisuami" name="tunjangan_istrisuami"
                                                    value="{{ number_format($item->tunjangan_istrisuami) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="tunjangan_anak"
                                                class="col-sm-5 col-form-label col-form-label-sm">3.
                                                Tunjangan
                                                Anak</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_anak" name="tunjangan_anak"
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
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_jabatan_struktural"
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
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_jabatan_fungsional"
                                                    name="tunjangan_jabatan_fungsional"
                                                    value="{{ number_format($item->tunjangan_jabatan_fungsional) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="tunjangan_umum"
                                                class="col-sm-5 col-form-label col-form-label-sm">6.
                                                Tunjangan
                                                Umum</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_umum" name="tunjangan_umum"
                                                    value="{{ number_format($item->tunjangan_umum) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="tunjangan_beras"
                                                class="col-sm-5 col-form-label col-form-label-sm">7.
                                                Tunjangan Beras</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_beras" name="tunjangan_beras"
                                                    value="{{ number_format($item->tunjangan_beras) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="tunjangan_pph"
                                                class="col-sm-5 col-form-label col-form-label-sm">8.
                                                Tunjangan
                                                PPH</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tes"
                                                    id="tunjangan_pph" name="tunjangan_pph"
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
                                                    id="pembulatan" name="pembulatan"
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
                                                    id="jumlah_kotor" name="jumlah_kotor"
                                                    value="{{ number_format($item->jumlah_kotor) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="iuran_wajib"
                                                class="col-sm-5 col-form-label col-form-label-sm">1.
                                                Iuran
                                                Wajib</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="iuran_wajib" name="iuran_wajib"
                                                    value="{{ number_format($item->iuran_wajib) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="bpjs" class="col-sm-5 col-form-label col-form-label-sm"> 2.
                                                BPJS</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="bpjs" name="bpjs"
                                                    value="{{ number_format($item->bpjs) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="sewa_rumah" class="col-sm-5 col-form-label col-form-label-sm">3.
                                                Sewa
                                                Rumah</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="sewa_rumah" name="sewa_rumah"
                                                    value="{{ number_format($item->sewa_rumah) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="pph_pasal_21" class="col-sm-5 col-form-label col-form-label-sm">
                                                4.
                                                PPh
                                                Pasal 21</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="pph_pasal_21" name="pph_pasal_21"
                                                    value="{{ number_format($item->pph_pasal_21) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-6">

                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="form-group">
                                            <a href="" class="btn btn-xs btn-cyan btn-icon" type="button"  data-toggle="modal"
                                                data-target="#Modaltambahpotongan2">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                           <a class="small text-info">Tambah Potongan</a>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="jumlah_potongan"
                                                class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah
                                                    Potongan</b></label>
                                            <div class="col-sm-1 text-center">
                                                <span><b>:</b></span>
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="jumlah_potongan" name="jumlah_potongan"
                                                    value="{{ number_format($item->jumlah_potongan) ?? '0' }}">
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <a href="" class="btn btn-xs btn-cyan btn-icon" type="button"
                                                        data-toggle="modal" data-target="#Modaltambahpotongan1">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <a class="small text-info">Tambah Pot.</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="jumlah_bersih_gaji"
                                                class="col-sm-5 col-form-label col-form-label-sm"><b>Jumlah
                                                    Bersih</b></label>
                                            <div class="col-sm-1 text-center">
                                                <span><b>:</b></span>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="jumlah_bersih_gaji" name="jumlah_bersih_gaji"
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
                                                <input type="text"
                                                    class="form-control form-control-sm number-separator tunjangan_kinerja"
                                                    id="tunjangan_kinerja" name="tunjangan_kinerja"
                                                    value="{{ number_format($item->tunjangan_kinerja) ?? '0' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="jumlah_potongan_lainnya"
                                                class="col-sm-4 col-form-label col-form-label-sm">Penerimaan
                                                Lain-Lain</label>
                                            <div class="col-sm-1 text-center">
                                                <span> : </span>
                                            </div>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="jumlah_potongan_lainnya" name="jumlah_potongan_lainnya"
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
                                                    <option value="{{ $item->User->id }}">
                                                        {{ $item->User->nama_pegawai }} </option>
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
                                                    name="id_user">
                                                    <option>Pilih Pegawai</option>
                                                    @foreach ($pegawai as $items)
                                                    <option value="{{ $items->id }}">{{ $items->nama_pegawai }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        @endif

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <label for="penerimaan_total"
                                                class="col-sm-4 col-form-label col-form-label-sm"><b>Penerimaan
                                                    Total</b></label>
                                            <div class="col-sm-1 text-center">
                                                <span><b>:</b> </span>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control form-control-sm number-separator"
                                                    id="penerimaan_total" name="penerimaan_total"
                                                    value="{{ number_format($item->penerimaan_total) ?? '0' }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <button class="btn btn-sm btn-secondary" type="button"
                                                    onclick="hitunggaji(event)">Hitung</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- TAB 2  ------------------------------------------------------------------------------------------------------------}}
                        <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                            <div class="px-2">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-left">
                                            <p class="font-italic small">Potongan-potongan :</p>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div>
                                <div class="px-2">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_absen_persen"
                                                    class="col-sm-5 col-form-label col-form-label-sm">1. Absen
                                                    (%)</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_absen_persen" name="potongan_absen_persen"
                                                        value="{{ number_format($item->potongan_absen_persen) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_absen"
                                                    class="col-sm-5 col-form-label col-form-label-sm">2. Absen
                                                    (Rp)</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_absen" name="potongan_absen"
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
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="tunj_setelah_pot_absen" name="tunj_setelah_pot_absen"
                                                        value="{{ number_format($item->tunj_setelah_pot_absen) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_dana_punia"
                                                    class="col-sm-5 col-form-label col-form-label-sm">
                                                    4. Dana Punia</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_dana_punia" name="potongan_dana_punia"
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
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_mushola" name="potongan_mushola"
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
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_nasrani" name="potongan_nasrani"
                                                        value="{{ number_format($item->potongan_nasrani) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_ar"
                                                    class="col-sm-5 col-form-label col-form-label-sm">7.
                                                    AR</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_ar" name="potongan_ar"
                                                        value="{{ number_format($item->potongan_ar) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_bpd"
                                                    class="col-sm-5 col-form-label col-form-label-sm">8.
                                                    BPD</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_bpd" name="potongan_bpd"
                                                        value="{{ number_format($item->potongan_bpd) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_bjb"
                                                    class="col-sm-5 col-form-label col-form-label-sm">9.
                                                    BJB</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator tes"
                                                        id="potongan_bjb" name="potongan_bjb"
                                                        value="{{ number_format($item->potongan_bjb) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_cakti_buddhi_bhakti"
                                                    class="col-sm-5 col-form-label col-form-label-sm">10.
                                                    Cakti Buddhi</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_cakti_buddhi_bhakti"
                                                        name="potongan_cakti_buddhi_bhakti"
                                                        value="{{ number_format($item->potongan_cakti_buddhi_bhakti) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_anak_asuh"
                                                    class="col-sm-5 col-form-label col-form-label-sm">11.
                                                    Anak Asuh</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_anak_asuh" name="potongan_anak_asuh"
                                                        value="{{ number_format($item->potongan_anak_asuh) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_futsal"
                                                    class="col-sm-5 col-form-label col-form-label-sm">12.
                                                    Futsal</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_futsal" name="potongan_futsal"
                                                        value="{{ number_format($item->potongan_futsal) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_umum"
                                                    class="col-sm-5 col-form-label col-form-label-sm">13.
                                                    Umum</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_umum" name="potongan_umum"
                                                        value="{{ number_format($item->potongan_umum) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_paguyuban"
                                                    class="col-sm-5 col-form-label col-form-label-sm">14.
                                                    Pot. Paguyuban</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_paguyuban" name="potongan_paguyuban"
                                                        value="{{ number_format($item->potongan_paguyuban) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_pinjaman_cbb"
                                                    class="col-sm-5 col-form-label col-form-label-sm">15.
                                                    Pinjaman CBB</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_pinjaman_cbb" name="potongan_pinjaman_cbb"
                                                        value="{{ number_format($item->potongan_pinjaman_cbb) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group row">
                                                <label for="potongan_kop_bali_sedana"
                                                    class="col-sm-5 col-form-label col-form-label-sm">16.
                                                    KOP Bali Sedana</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_kop_bali_sedana" name="potongan_kop_bali_sedana"
                                                        value="{{ number_format($item->potongan_kop_bali_sedana) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <a href="" class="btn btn-xs btn-cyan btn-icon" type="button"
                                                    data-toggle="modal" data-target="#Modaltambahpotongan2">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <a class="small text-info">Tambah Potongan</a>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- POTONGAN --}}
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="tukin_setelah_potongan2"
                                                    class="col-sm-4 col-form-label col-form-label-sm">Tukin Setelah
                                                    Potongan2</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="tukin_setelah_potongan2" name="tukin_setelah_potongan2"
                                                        value="{{ number_format($item->tukin_setelah_potongan2) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="potongan_jumlah"
                                                    class="col-sm-4 col-form-label col-form-label-sm"><b>Jumlah
                                                        Potongan</b></label>
                                                <div class="col-sm-1 text-center">
                                                    <span><b>:</b></span>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="potongan_jumlah" name="potongan_jumlah"
                                                        value="{{ number_format($item->potongan_jumlah) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="rapel_tukin"
                                                    class="col-sm-4 col-form-label col-form-label-sm">Rapel
                                                    Tukin</label>
                                                <div class="col-sm-1 text-center">
                                                    <span> : </span>
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="rapel_tukin" name="rapel_tukin"
                                                        value="{{ number_format($item->rapel_tukin) ?? '0' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label for="tukin_dibayarkan"
                                                    class="col-sm-4 col-form-label col-form-label-sm"><b>Tukin
                                                        Dibayarkan</b></label>
                                                <div class="col-sm-1 text-center">
                                                    <span><b>:</b></span>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text"
                                                        class="form-control form-control-sm number-separator"
                                                        id="tukin_dibayarkan" name="tukin_dibayarkan"
                                                        value="{{ number_format($item->tukin_dibayarkan) ?? '0' }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-sm btn-secondary" type="button"
                                                        onclick="hitungpotongan(event,)">Hitung</button>
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
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                        data-target="#Modalsumbit">Simpan Data</button>

                </div>
        </form>
    </div>

    </div>
</main>

{{-- POTONGAN GAJI UTAMA --}}
<div class="modal fade" id="Modaltambahpotongan1" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Potongan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji.store') }}" id="formpotonganutama" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="nama_potongan_utama">Nama Potongan</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" id="nama_potongan_utama" type="text" name="nama_potongan_utama"
                                    value="{{ old('nama_potongan_utama') }}" placeholder="input Nama Potongan" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="jumlah_potongan_utama">Jumlah Potongan (IDR)</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control number-separator" id="jumlah_potongan_utama" type="text"
                                    name="jumlah_potongan_utama" placeholder="Input Jumlah Potongan" value="{{ old('jumlah_potongan_utama') }}" required>  
                            </div>
                        </div>
                        <div class="col-4 mt-4 p-2">
                                <button class="btn btn-xs btn-cyan btn-icon" onclick="tambahpotonganutama(event)" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <a class="small text-info">Tambah Pot.</a>
                        </div>
                        <p class="small ml-4">Jumlah Potongan Terhitung: <span class="text-primary" id="jumlahpotonganutamaterhitung">{{ number_format($sumpotonganutama)?? 0 }}</span></p>

                    </div>
                    <hr class="mt-4">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTableUtama"
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
                                                    style="width: 140px;">Nama Potongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Jumlah Potongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 70px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablepotonganutama">
                                            @forelse ($item->Detailpotonganutama as $tes)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}.</th>
                                                <td>{{ $tes->nama_potongan_utama }}</td>
                                                <td>{{ number_format($tes->jumlah_potongan_utama) }}</td>
                                                <td></td>
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
            </form>
        </div>
    </div>
</div>

{{-- POTONGAN TUKIN --}}
<div class="modal fade" id="Modaltambahpotongan2" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Potongan Tukin</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji.store') }}" id="formpotongantukin" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="nama_potongan">Nama Potongan</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" id="nama_potongan" type="text" name="nama_potongan"
                                    value="{{ old('nama_potongan') }}" placeholder="input Nama Potongan" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="jumlah_potongan">Jumlah Potongan (IDR)</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control number-separator" id="jumlah_potongan" type="text"
                                    name="jumlah_potongan" placeholder="Input Jumlah Potongan" value="{{ old('jumlah_potongan') }}" required>
                                    
                            </div>
                        </div>
                        <div class="col-4 mt-4 p-2">
                            <button class="btn btn-xs btn-cyan btn-icon" onclick="tambahpotongantukin(event)" type="button"><i class="fas fa-plus"></i></button>
                            <a class="small text-info">Tambah Pot.</a>
                        </div>
                    </div>
                    <p class="small ml-4">Jumlah Potongan Terhitung: <span class="text-primary" id="potongantotaltukin">{{ number_format($sumpotongantukin)?? 0 }}</span></p>
                    <hr class="mt-4">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTablePotongan"
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
                                                    style="width: 140px;">Nama Potongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Jumlah Potongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 70px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablepotongantukin">
                                            @forelse ($item->Detailpotongantukin as $tes)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}.</th>
                                                <td>{{ $tes->nama_potongan_tukin }}</td>
                                                <td>{{ number_format($tes->jumlah_potongan_tukin) }}</td>
                                                <td></td>
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
            </form>
        </div>
    </div>
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
                    onclick="simpandata(event, {{ $item->id_detail_gaji }}, {{ $item->Gaji->id_gaji_pegawai }})">Ya
                    Sudah!</button>
            </div>
        </div>
    </div>
</div>

<template id="template_delete_button_utama">
    <button class="btn btn-danger btn-datatable" onclick="hapuspotonganutama(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_delete_button_potongan">
    <button class="btn btn-danger btn-datatable" onclick="hapuspotongantukin(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<script>
    function tambahpotonganutama(event){
        var form = $('#formpotonganutama')
        var nama_potongan_utama = form.find('input[name="nama_potongan_utama"]').val()
        var jumlah_potongan_utama_el = form.find('input[name="jumlah_potongan_utama"]').val()
        var jumlah_potongan_utama = jumlah_potongan_utama_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
    
        if (nama_potongan_utama == 0 | nama_potongan_utama == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field Nama Potongan Kosong',
            })
        }else if(jumlah_potongan_utama == '' | jumlah_potongan_utama == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field Jumlah Potongan Kosong',
            })
        } else {
            $('#dataTableUtama').DataTable().row.add([
                nama_potongan_utama, nama_potongan_utama, jumlah_potongan_utama_el, nama_potongan_utama
            ]).draw();

            var nama_potongan_utama = form.find('input[name="nama_potongan_utama"]').val(null)
            var jumlah_potongan_utama_el = form.find('input[name="jumlah_potongan_utama"]').val(null)
            
            // JUMLAH POTONGAN
            var jumlah_potongan_el = $('#jumlah_potongan').val()
            var jumlah_potongan = jumlah_potongan_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
            var perhitungan_potongan = parseInt(jumlah_potongan) + parseInt(jumlah_potongan_utama)
            $('#jumlah_potongan').val(perhitungan_potongan)
            if (/^[0-9.,]+$/.test($('#jumlah_potongan').val())) {
                $('#jumlah_potongan').val(
                    parseFloat($('#jumlah_potongan').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlah_potongan').val(
                    $('#jumlah_potongan')
                    .val()
                    .substring(0, $('#jumlah_potongan').val().length - 1)
                );
            }

            // HTML JUMLAH POTONGAN
            var jumlahpotonganutamaterhitung_el = $('#jumlahpotonganutamaterhitung').html()
            var jumlahpotonganutamaterhitung = jumlahpotonganutamaterhitung_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()

            var perhitungan = parseInt(jumlahpotonganutamaterhitung) + parseInt(jumlah_potongan_utama)
            $('#jumlahpotonganutamaterhitung').html(perhitungan)
            if (/^[0-9.,]+$/.test($('#jumlahpotonganutamaterhitung').html())) {
                $('#jumlahpotonganutamaterhitung').html(
                    parseFloat($('#jumlahpotonganutamaterhitung').html().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlahpotonganutamaterhitung').html(
                    $('#jumlahpotonganutamaterhitung')
                    .html()
                    .substring(0, $('#jumlahpotonganutamaterhitung').html().length - 1)
                );
            }

            // PENAMBAHAN GAJI BERSIH
            var jumlah_kotor_el = $('#jumlah_kotor').val()
            var jumlah_kotor = jumlah_kotor_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
            var jumlah_potongan_1 = $('#jumlah_potongan').val()
            var jumlah_potongan_1_el = jumlah_potongan_1.replace(',', '').replace(',', '').replace(',', '')
            .trim()
            var perhitungan_bersih = parseInt(jumlah_kotor) - parseInt(jumlah_potongan_1_el)
            var jumlah_bersih_gaji = $('#jumlah_bersih_gaji').val(perhitungan_bersih)
            if (/^[0-9.,]+$/.test($('#jumlah_bersih_gaji').val())) {
                $('#jumlah_bersih_gaji').val(
                    parseFloat($('#jumlah_bersih_gaji').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlah_bersih_gaji').val(
                    $('#jumlah_bersih_gaji')
                    .val()
                    .substring(0, $('#jumlah_bersih_gaji').val().length - 1)
                );
            }

            // PENAMBAHAN PENERIMAAN TOTAL
            var penerimaan_total_el = $('#penerimaan_total').val()
            var penerimaan_total = penerimaan_total_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
            var perhitungan_penerimaan_total = parseInt(penerimaan_total) - parseInt(jumlah_potongan_utama)
            $('#penerimaan_total').val(perhitungan_penerimaan_total)
            if (/^[0-9.,]+$/.test($('#penerimaan_total').val())) {
                $('#penerimaan_total').val(
                    parseFloat($('#penerimaan_total').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#penerimaan_total').val(
                    $('#penerimaan_total')
                    .val()
                    .substring(0, $('#penerimaan_total').val().length - 1)
                );
            }

            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menambah Data Potongan'
            })
        }
    }

    function hapuspotonganutama(element){
        var table = $('#dataTableUtama').DataTable()
        var row = $(element).parent().parent()
        table.row(row).remove().draw();

        var jumlah = $(row.children()[2]).text()
        var splitjumlah = jumlah.replace(',', '').replace(',', '').replace(',', '')
            .trim()
       
        var jumlahpotonganutamaterhitung_el = $('#jumlahpotonganutamaterhitung').html()
        var jumlahpotonganutamaterhitung = jumlahpotonganutamaterhitung_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var pengurangan =  parseInt(jumlahpotonganutamaterhitung) - parseInt(splitjumlah)
        $('#jumlahpotonganutamaterhitung').html(pengurangan)
        if (/^[0-9.,]+$/.test($('#jumlahpotonganutamaterhitung').html())) {
            $('#jumlahpotonganutamaterhitung').html(
                parseFloat($('#jumlahpotonganutamaterhitung').html().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#jumlahpotonganutamaterhitung').html(
                $('#jumlahpotonganutamaterhitung')
                .html()
                .substring(0, $('#jumlahpotonganutamaterhitung').html().length - 1)
            );
        }

        // PENGURANGAN JUMLAH POTONGAN
        var jumlah_potongan_el = $('#jumlah_potongan').val()
        var jumlah_potongan = jumlah_potongan_el.replace(',', '').replace(',', '').replace(',', '').trim()
        var pengurangan_potongan_val = parseInt(jumlah_potongan) - parseInt(splitjumlah)
        $('#jumlah_potongan').val(pengurangan_potongan_val)
        if (/^[0-9.,]+$/.test($('#jumlah_potongan').val())) {
            $('#jumlah_potongan').val(
                parseFloat($('#jumlah_potongan').val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#jumlah_potongan').val(
                $('#jumlah_potongan')
                .val()
                .substring(0, $('#jumlah_potongan').val().length - 1)
            );
        }

        // PENGURANGAN GAJI BERSIH
        var jumlah_bersih_gaji_el = $('#jumlah_bersih_gaji').val()
        var jumlah_bersih_1 = jumlah_bersih_gaji_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var jumlah_potongan_1 = $('#jumlah_potongan').val()
        var jumlah_potongan_1_el = jumlah_potongan_1.replace(',', '').replace(',', '').replace(',', '')
        .trim()
        var perhitungan_bersih = parseInt(jumlah_bersih_1) + parseInt(splitjumlah)
        console.log(perhitungan_bersih, jumlah_bersih_1, jumlahpotonganutamaterhitung)

        var jumlah_bersih_gaji = $('#jumlah_bersih_gaji').val(perhitungan_bersih)
        if (/^[0-9.,]+$/.test($('#jumlah_bersih_gaji').val())) {
            $('#jumlah_bersih_gaji').val(
                parseFloat($('#jumlah_bersih_gaji').val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#jumlah_bersih_gaji').val(
                $('#jumlah_bersih_gaji')
                .val()
                .substring(0, $('#jumlah_bersih_gaji').val().length - 1)
            );
        }

        // PENGURANGAN PENERIMAAN TOTAL
        var penerimaan_total_el = $('#penerimaan_total').val()
        var penerimaan_total = penerimaan_total_el.replace(',', '').replace(',', '').replace(',', '').trim()
        var perhitungan_penerimaan_total = parseInt(penerimaan_total) + parseInt(splitjumlah)
        $('#penerimaan_total').val(perhitungan_penerimaan_total)
        if (/^[0-9.,]+$/.test($('#penerimaan_total').val())) {
            $('#penerimaan_total').val(
                parseFloat($('#penerimaan_total').val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#penerimaan_total').val(
                $('#penerimaan_total')
                .val()
                .substring(0, $('#penerimaan_total').val().length - 1)
            );
        }

        const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menghapus Potongan'
            })
    }

    function tambahpotongantukin (event){
        var form = $('#formpotongantukin')
        var nama_potongan = form.find('input[name="nama_potongan"]').val()
        var jumlah_potongan_el = form.find('input[name="jumlah_potongan"]').val()
        var jumlah_potongan = jumlah_potongan_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
    
        if (nama_potongan == 0 | nama_potongan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field Nama Potongan Kosong',
            })
        }else if(jumlah_potongan == '' | jumlah_potongan == 0){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Field Jumlah Potongan Kosong',
            })
        } else {

            $('#dataTablePotongan').DataTable().row.add([
                nama_potongan, nama_potongan, jumlah_potongan_el, nama_potongan
            ]).draw();

            var nama_potongan_null = form.find('input[name="nama_potongan"]').val(null)
            var jumlah_potongan_null = form.find('input[name="jumlah_potongan"]').val(null)

            // TOTAL POTONGAN TUKIN HTML MODAL
            var potongantotaltukin_el = $('#potongantotaltukin').html()
            var potongantotaltukin = potongantotaltukin_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()
            var perhitunganpotongantotaltukin = parseInt(jumlah_potongan) + parseInt(potongantotaltukin)
            $('#potongantotaltukin').html(perhitunganpotongantotaltukin)
            if (/^[0-9.,]+$/.test($('#potongantotaltukin').html())) {
                $('#potongantotaltukin').html(
                    parseFloat($('#potongantotaltukin').html().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#potongantotaltukin').html(
                    $('#potongantotaltukin')
                    .html()
                    .substring(0, $('#potongantotaltukin').html().length - 1)
                );
            }

            // PERTAMBAHAN TOTAL POTONGAN JUMLAH
            var potongan_jumlah_el = $('#potongan_jumlah').val()
            var potongan_jumlah = potongan_jumlah_el.replace(',', '').replace(',', '').replace(',', '').trim()
            var perhitungan_potongan_jumlah = parseInt(potongan_jumlah) + parseInt(jumlah_potongan)
            $('#potongan_jumlah').val(perhitungan_potongan_jumlah)
            if (/^[0-9.,]+$/.test($('#potongan_jumlah').val())) {
                $('#potongan_jumlah').val(
                    parseFloat($('#potongan_jumlah').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#potongan_jumlah').val(
                    $('#potongan_jumlah')
                    .val()
                    .substring(0, $('#potongan_jumlah').val().length - 1)
                );
            }

            // PERTAMBAHAN TUKIN DIBAYARKAN
            var tukin_dibayarkan_el = $('#tukin_dibayarkan').val()
            var tukin_dibayarkan = tukin_dibayarkan_el.replace(',', '').replace(',', '').replace(',', '').trim()
            var perhitungan_tukin_dibayarkan = parseInt(tukin_dibayarkan) - parseInt(jumlah_potongan)
            $('#tukin_dibayarkan').val(perhitungan_tukin_dibayarkan)
            if (/^[0-9.,]+$/.test($('#tukin_dibayarkan').val())) {
                $('#tukin_dibayarkan').val(
                    parseFloat($('#tukin_dibayarkan').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#tukin_dibayarkan').val(
                    $('#tukin_dibayarkan')
                    .val()
                    .substring(0, $('#tukin_dibayarkan').val().length - 1)
                );
            }

            const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menambah Data Potongan Tukin'
            })
            


        }
    }

    function hapuspotongantukin (element){
        var table = $('#dataTablePotongan').DataTable()
        var row = $(element).parent().parent()
        table.row(row).remove().draw();

        var jumlah = $(row.children()[2]).text()
        var jumlah_potongan = jumlah.replace(',', '').replace(',', '').replace(',', '').trim()

        // POTONGAN TOTAL TUKIN HTML MODAL
        var potongantotaltukin_el = $('#potongantotaltukin').html()
        var potongantotaltukin = potongantotaltukin_el.replace(',', '').replace(',', '').replace(',', '')
        .trim()
        var perhitunganpotongantotaltukin = parseInt(potongantotaltukin) - parseInt(jumlah_potongan)
        $('#potongantotaltukin').html(perhitunganpotongantotaltukin)
        if (/^[0-9.,]+$/.test($('#potongantotaltukin').html())) {
            $('#potongantotaltukin').html(
                parseFloat($('#potongantotaltukin').html().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#potongantotaltukin').html(
                $('#potongantotaltukin')
                .html()
                .substring(0, $('#potongantotaltukin').html().length - 1)
            );
        }

        // JUMLAH POTONGAN VALUE
        var potongan_jumlah_el = $('#potongan_jumlah').val()
        var potongan_jumlah = potongan_jumlah_el.replace(',', '').replace(',', '').replace(',', '').trim()
        var perhitungan_potongan_jumlah = parseInt(potongan_jumlah) - parseInt(jumlah_potongan)
        $('#potongan_jumlah').val(perhitungan_potongan_jumlah)
        if (/^[0-9.,]+$/.test($('#potongan_jumlah').val())) {
            $('#potongan_jumlah').val(
                parseFloat($('#potongan_jumlah').val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#potongan_jumlah').val(
                $('#potongan_jumlah')
                .val()
                .substring(0, $('#potongan_jumlah').val().length - 1)
            );
        }

        // TOTAL TUKIN DIBAYARKAN
        var tukin_dibayarkan_el = $('#tukin_dibayarkan').val()
        var tukin_dibayarkan = tukin_dibayarkan_el.replace(',', '').replace(',', '').replace(',', '').trim()
        var perhitungan_tukin_dibayarkan = parseInt(tukin_dibayarkan) + parseInt(jumlah_potongan)
        $('#tukin_dibayarkan').val(perhitungan_tukin_dibayarkan)
        if (/^[0-9.,]+$/.test($('#tukin_dibayarkan').val())) {
            $('#tukin_dibayarkan').val(
                parseFloat($('#tukin_dibayarkan').val().replace(/,/g, '')).toLocaleString('en')
            );
        } else {
            $('#tukin_dibayarkan').val(
                $('#tukin_dibayarkan')
                .val()
                .substring(0, $('#tukin_dibayarkan').val().length - 1)
            );
        }
        const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

            Toast.fire({
                icon: 'success',
                title: 'Berhasil Menghapus Data Potongan Tukin'
            })
            

    }

    function simpandata(event, id_detail_gaji, id_gaji_pegawai) {
        event.preventDefault()
        var _token = $('#form1').find('input[name="_token"]').val()
        var form = $('#form1')
        var datapotonganutama = []
        var datapotongantukin = []

        var id = form.find('select[name="id_user"]').val()
        var nama = form.find('select[name="id_user"] option:selected').text()

        var gaji_pokok_element = form.find('input[name="gaji_pokok"]').val()
        var gaji_pokok = gaji_pokok_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_istrisuami_element = form.find('input[name="tunjangan_istrisuami"]').val()
        var tunjangan_istrisuami = tunjangan_istrisuami_element.replace(',', '').replace(',', '').replace(
                ',', '')
            .trim()

        var tunjangan_anak_element = form.find('input[name="tunjangan_anak"]').val()
        var tunjangan_anak = tunjangan_anak_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_jabatan_struktural_element = form.find('input[name="tunjangan_jabatan_struktural"]')
            .val()
        var tunjangan_jabatan_struktural = tunjangan_jabatan_struktural_element.replace(',', '').replace(
                ',', '')
            .replace(',', '').trim()

        var tunjangan_jabatan_fungsional_element = form.find('input[name="tunjangan_jabatan_fungsional"]')
            .val()
        var tunjangan_jabatan_fungsional = tunjangan_jabatan_fungsional_element.replace(',', '').replace(
                ',', '')
            .replace(',', '').trim()

        var tunjangan_umum_element = form.find('input[name="tunjangan_umum"]').val()
        var tunjangan_umum = tunjangan_umum_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_beras_element = form.find('input[name="tunjangan_beras"]').val()
        var tunjangan_beras = tunjangan_beras_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

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
        var jumlah_potongan = jumlah_potongan_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var jumlah_bersih_gaji_element = form.find('input[name="jumlah_bersih_gaji"]').val()
        var jumlah_bersih_gaji = jumlah_bersih_gaji_element.replace(',', '').replace(',', '').replace(',',
                '')
            .trim()

        var tunjangan_kinerja_element = form.find('input[name="tunjangan_kinerja"]').val()
        var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var jumlah_potongan_lainnya_element = form.find('input[name="jumlah_potongan_lainnya"]').val()
        var jumlah_potongan_lainnya = jumlah_potongan_lainnya_element.replace(',', '').replace(',', '')
            .replace(',',
                '').trim()

        var penerimaan_total_element = form.find('input[name="penerimaan_total"]').val()
        var penerimaan_total = penerimaan_total_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()


        // POTONGAN - POTONGAN ---------------------------------------------------------------------------
        var potongan_absen_element = form.find('input[name="potongan_absen"]').val()
        var potongan_absen = potongan_absen_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var potongan_absen_persen = form.find('input[name="potongan_absen_persen"]').val()

        var tunj_setelah_pot_absen_element = form.find('input[name="tunj_setelah_pot_absen"]').val()
        var tunj_setelah_pot_absen = tunj_setelah_pot_absen_element.replace(',', '').replace(',', '')
            .replace(',',
                '')
            .trim()

        var potongan_dana_punia_element = form.find('input[name="potongan_dana_punia"]').val()
        var potongan_dana_punia = potongan_dana_punia_element.replace(',', '').replace(',', '').replace(',',
                '')
            .trim()

        var potongan_mushola_element = form.find('input[name="potongan_mushola"]').val()
        var potongan_mushola = potongan_mushola_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var potongan_nasrani_element = form.find('input[name="potongan_nasrani"]').val()
        var potongan_nasrani = potongan_nasrani_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var potongan_ar_element = form.find('input[name="potongan_ar"]').val()
        var potongan_ar = potongan_ar_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_bpd_element = form.find('input[name="potongan_bpd"]').val()
        var potongan_bpd = potongan_bpd_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_bjb_element = form.find('input[name="potongan_bjb"]').val()
        var potongan_bjb = potongan_bjb_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_cakti_buddhi_bhakti_el = form.find('input[name="potongan_cakti_buddhi_bhakti"]').val()
        var potongan_cakti_buddhi_bhakti = potongan_cakti_buddhi_bhakti_el.replace(',', '').replace(',', '')
            .replace(
                ',', '').trim()

        var potongan_anak_asuh_el = form.find('input[name="potongan_anak_asuh"]').val()
        var potongan_anak_asuh = potongan_anak_asuh_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var potongan_futsal_el = form.find('input[name="potongan_futsal"]').val()
        var potongan_futsal = potongan_futsal_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_umum_el = form.find('input[name="potongan_umum"]').val()
        var potongan_umum = potongan_umum_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan_paguyuban_el = form.find('input[name="potongan_paguyuban"]').val()
        var potongan_paguyuban = potongan_paguyuban_el.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var potongan_pinjaman_cbb_el = form.find('input[name="potongan_pinjaman_cbb"]').val()
        var potongan_pinjaman_cbb = potongan_pinjaman_cbb_el.replace(',', '').replace(',', '').replace(',',
                '')
            .trim()

        var potongan_kop_bali_sedana_el = form.find('input[name="potongan_kop_bali_sedana"]').val()
        var potongan_kop_bali_sedana = potongan_kop_bali_sedana_el.replace(',', '').replace(',', '')
            .replace(',',
                '')
            .trim()

        var tukin_setelah_potongan2_el = form.find('input[name="tukin_setelah_potongan2"]').val()
        var tukin_setelah_potongan2 = tukin_setelah_potongan2_el.replace(',', '').replace(',', '').replace(
                ',', '')
            .trim()

        var potongan_jumlah_el = form.find('input[name="potongan_jumlah"]').val()
        var potongan_jumlah = potongan_jumlah_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var rapel_tukin_el = form.find('input[name="rapel_tukin"]').val()
        var rapel_tukin = rapel_tukin_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var tukin_dibayarkan_el = form.find('input[name="tukin_dibayarkan"]').val()
        var tukin_dibayarkan = tukin_dibayarkan_el.replace(',', '').replace(',', '').replace(',', '').trim()

        var potongan = $('#tablepotonganutama').children()
        for (let index = 0; index < potongan.length; index++) {
            var children = $(potongan[index]).children()

            var td_nama_potongan = children[1]
            var nama_potongan_utama = $(td_nama_potongan).html()
            
            var td_jumlah_potongan = children[2]
            var jumlah_potongan_1 = $(td_jumlah_potongan).html()
            var jumlah_potongan_utama = jumlah_potongan_1.replace(',', '').replace(',', '').replace(',', '').trim()
            
            datapotonganutama.push({
                id_detail_gaji: id_detail_gaji,
                nama_potongan_utama: nama_potongan_utama,
                jumlah_potongan_utama: jumlah_potongan_utama,
            })
        }

        var potongan_tukin = $('#tablepotongantukin').children()
        for (let index = 0; index < potongan_tukin.length; index++) {
            var children_tukin = $(potongan_tukin[index]).children()

            var td_nama_potongan_tukin = children_tukin[1]
            var nama_potongan_tukin = $(td_nama_potongan_tukin).html()
            
            var td_jumlah_potongan_tukin = children_tukin[2]
            var jumlah_potongan_tukin_x = $(td_jumlah_potongan_tukin).html()
            var jumlah_potongan_tukin = jumlah_potongan_tukin_x.replace(',', '').replace(',', '').replace(',', '').trim()
            
            datapotongantukin.push({
                id_detail_gaji: id_detail_gaji,
                nama_potongan_tukin: nama_potongan_tukin,
                jumlah_potongan_tukin: jumlah_potongan_tukin,
            })
        }

        if (gaji_pokok == '' | tunjangan_istrisuami == '' | tunjangan_anak == '' |
            tunjangan_jabatan_struktural == '' | tunjangan_jabatan_fungsional == '' | tunjangan_umum == '' |
            tunjangan_beras == '' | tunjangan_pph == '' | pembulatan == '' | jumlah_kotor == '' |
            iuran_wajib ==
            '' |
            bpjs == '' | sewa_rumah == '' | pph_pasal_21 == '' | jumlah_potongan == '' |
            jumlah_bersih_gaji == '' |
            tunjangan_kinerja == '' | jumlah_potongan_lainnya == '' | penerimaan_total == '' |
            potongan_absen ==
            '' |
            potongan_absen_persen == '' | tunj_setelah_pot_absen == '' | potongan_dana_punia == '' |
            potongan_mushola ==
            '' | potongan_nasrani == '' | potongan_ar == '' | potongan_bpd == '' | potongan_bjb == '' |
            potongan_cakti_buddhi_bhakti == '' | potongan_anak_asuh == '' | potongan_futsal == '' |
            potongan_umum ==
            '' | potongan_paguyuban == '' | potongan_pinjaman_cbb == '' | potongan_kop_bali_sedana == '' |
            tukin_setelah_potongan2 == '' | rapel_tukin == '' | potongan_jumlah == '' | tukin_dibayarkan ==
            '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong! Isi Dengan 0',
            })
        } else if (id == '' | id == 'Pilih Pegawai') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memilih Pegawai',
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

            var data = {
                _token: _token,
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
                tukin_dibayarkan: tukin_dibayarkan,
                nama: nama,
                potonganutama: datapotonganutama,
                potongantukin: datapotongantukin
            }

            $.ajax({
                method: 'put',
                url: '/gaji/' + id_detail_gaji + '/updatedata',
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
                    window.location.href = '/gaji/' + id_gaji_pegawai

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

    function hitunggaji(event) {
        var gaji_pokok_element = $('#gaji_pokok').val()
        var gaji_pokok = gaji_pokok_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var tunjangan_istrisuami_element = $('#tunjangan_istrisuami').val()
        var tunjangan_istrisuami = tunjangan_istrisuami_element.replace(',', '').replace(',', '').replace(
                ',', '')
            .trim()

        var tunjangan_anak_element = $('#tunjangan_anak').val()
        var tunjangan_anak = tunjangan_anak_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_jabatan_struktural_element = $('#tunjangan_jabatan_struktural').val()
        var tunjangan_jabatan_struktural = tunjangan_jabatan_struktural_element.replace(',', '').replace(
                ',', '')
            .replace(',', '').trim()

        var tunjangan_jabatan_fungsional_element = $('#tunjangan_jabatan_fungsional').val()
        var tunjangan_jabatan_fungsional = tunjangan_jabatan_fungsional_element.replace(',', '').replace(
                ',', '')
            .replace(',', '').trim()

        var tunjangan_umum_element = $('#tunjangan_umum').val()
        var tunjangan_umum = tunjangan_umum_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_beras_element = $('#tunjangan_beras').val()
        var tunjangan_beras = tunjangan_beras_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var tunjangan_pph_element = $('#tunjangan_pph').val()
        var tunjangan_pph = tunjangan_pph_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var pembulatan_element = $('#pembulatan').val()
        var pembulatan = pembulatan_element.replace(',', '').replace(',', '').replace(',', '').trim()

        // POTONGAN
        var iuran_wajib_element = $('#iuran_wajib').val()
        var iuran_wajib = iuran_wajib_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var bpjs_element = $('#bpjs').val()
        var bpjs = bpjs_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var sewa_rumah_element = $('#sewa_rumah').val()
        var sewa_rumah = sewa_rumah_element.replace(',', '').replace(',', '').replace(',', '').trim()

        var pph_pasal_21_element = $('#pph_pasal_21').val()
        var pph_pasal_21 = pph_pasal_21_element.replace(',', '').replace(',', '').replace(',', '').trim()

        // PENERIMAAN LAIN LAIN
        var tunjangan_kinerja_element = $('#tunjangan_kinerja').val()
        var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',', '')
            .trim()

        var penerimaan_lain_lain_el = $('#jumlah_potongan_lainnya').val()
        var jumlah_potongan_lainnya = penerimaan_lain_lain_el.replace(',', '').replace(',', '').replace(',',
                '')
            .trim()

        var nama = $('#namates option:selected').text().trim()

        var jumlahpotonganutamaterhitung_el = $('#jumlahpotonganutamaterhitung').html()
        var jumlahpotonganutamaterhitung = jumlahpotonganutamaterhitung_el.replace(',', '').replace(',', '').replace(',', '')
        .trim()

        if (gaji_pokok == '' | tunjangan_istrisuami == '' | tunjangan_anak == '' |
            tunjangan_jabatan_struktural ==
            '' |
            tunjangan_jabatan_fungsional == '' | tunjangan_umum == '' |
            tunjangan_beras == '' | tunjangan_pph == '' | pembulatan == '' | jumlah_kotor == '' |
            iuran_wajib ==
            '' |
            bpjs == '' | sewa_rumah == '' | pph_pasal_21 == '' | jumlah_potongan == '' |
            jumlah_bersih_gaji == '' |
            tunjangan_kinerja == '' |
            penerimaan_total == '' | jumlah_potongan_lainnya == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong! Isi dengan 0',
            });
        } else if (nama == 'Pilih Pegawai') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memilih Pegawai',
            });
        } else {

            // PERHITUNGAN KOTOR
            var perhitungan_kotor = parseInt(gaji_pokok) + parseInt(tunjangan_istrisuami) + parseInt(
                    tunjangan_anak) +
                parseInt(tunjangan_jabatan_struktural) +
                parseInt(tunjangan_jabatan_fungsional) + parseInt(tunjangan_umum) +
                parseInt(tunjangan_beras) + parseInt(tunjangan_pph) + parseInt(pembulatan)
            var jumlah_kotor = $('#jumlah_kotor').val(perhitungan_kotor)
            if (/^[0-9.,]+$/.test($('#jumlah_kotor').val())) {
                $('#jumlah_kotor').val(
                    parseFloat($('#jumlah_kotor').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlah_kotor').val(
                    $('#jumlah_kotor')
                    .val()
                    .substring(0, $('#jumlah_kotor').val().length - 1)
                );
            }

            // PERHITUNGAN POTONGAN
            var perhitungan_potongan = parseInt(iuran_wajib) + parseInt(bpjs) + parseInt(sewa_rumah) +
                parseInt(pph_pasal_21) + parseInt(jumlahpotonganutamaterhitung)
            var jumlah_potongan = $('#jumlah_potongan').val(perhitungan_potongan)
            if (/^[0-9.,]+$/.test($('#jumlah_potongan').val())) {
                $('#jumlah_potongan').val(
                    parseFloat($('#jumlah_potongan').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlah_potongan').val(
                    $('#jumlah_potongan')
                    .val()
                    .substring(0, $('#jumlah_potongan').val().length - 1)
                );
            }

            // PERHITUNGAN BERSIH
            var perhitungan_bersih = parseInt(perhitungan_kotor) - parseInt(perhitungan_potongan)
            var jumlah_bersih_gaji = $('#jumlah_bersih_gaji').val(perhitungan_bersih)

            if (/^[0-9.,]+$/.test($('#jumlah_bersih_gaji').val())) {
                $('#jumlah_bersih_gaji').val(
                    parseFloat($('#jumlah_bersih_gaji').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#jumlah_bersih_gaji').val(
                    $('#jumlah_bersih_gaji')
                    .val()
                    .substring(0, $('#jumlah_bersih_gaji').val().length - 1)
                );
            }

            // var perhitungan_penerimaan_lain_lain = parseInt(sewa_rumah) + parseInt(perhitungan_potongan) + parseInt(perhitungan_bersih)
            // var penerimaan_lain_lain = $('#jumlah_potongan_lainnya').val(perhitungan_penerimaan_lain_lain)
            // if (/^[0-9.,]+$/.test($('#jumlah_potongan_lainnya').val())) {
            // $('#jumlah_potongan_lainnya').val(
            //     parseFloat($('#jumlah_potongan_lainnya').val().replace(/,/g, '')).toLocaleString('en')
            // );
            // } else {
            //     $('#jumlah_potongan_lainnya').val(
            //         $('#jumlah_potongan_lainnya')
            //         .val()
            //         .substring(0, $('#jumlah_potongan_lainnya').val().length - 1)
            //     );
            // }

            // PENERIMAAN TOTAL
            var perhitungan_grand = parseInt(perhitungan_bersih) + parseInt(tunjangan_kinerja) + parseInt(
                jumlah_potongan_lainnya)
            var penerimaan_total = $('#penerimaan_total').val(perhitungan_grand)
            if (/^[0-9.,]+$/.test($('#penerimaan_total').val())) {
                $('#penerimaan_total').val(
                    parseFloat($('#penerimaan_total').val().replace(/,/g, '')).toLocaleString('en')
                );
            } else {
                $('#penerimaan_total').val(
                    $('#penerimaan_total')
                    .val()
                    .substring(0, $('#penerimaan_total').val().length - 1)
                );
            }


            Swal.fire({
                title: 'Perhatikan!',
                text: "Apakah Anda Ingih Menghitung Potongan Sekaligus?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hitung Potongan Sekaligus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var tunjangan_kinerja_element = $('#tunjangan_kinerja').val()
                    var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',',
                            '')
                        .replace(
                            ',', '').trim()

                    if (tunjangan_kinerja == '' | tunjangan_kinerja == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Tunjangan Kinerja Bernilai 0',
                        });
                    } else {
                        var potongan_absen_element = $('#potongan_absen').val()
                        var potongan_absen = potongan_absen_element.replace(',', '').replace(',',
                                '')
                            .replace(
                                ',', '').trim()

                        var tunj_setelah_pot_absen_element = $('#tunj_setelah_pot_absen').val()
                        var tunj_setelah_pot_absen = tunj_setelah_pot_absen_element.replace(',', '')
                            .replace(
                                ',', '').replace(',',
                                '').trim()

                        var potongan_dana_punia_element = $('#potongan_dana_punia').val()
                        var potongan_dana_punia = potongan_dana_punia_element.replace(',', '')
                            .replace(',',
                                '')
                            .replace(',', '')
                            .trim()

                        var potongan_mushola_element = $('#potongan_mushola').val()
                        var potongan_mushola = potongan_mushola_element.replace(',', '').replace(
                                ',', '')
                            .replace(',', '').trim()

                        var potongan_nasrani_element = $('#potongan_nasrani').val()
                        var potongan_nasrani = potongan_nasrani_element.replace(',', '').replace(
                                ',', '')
                            .replace(',', '').trim()

                        var potongan_ar_element = $('#potongan_ar').val()
                        var potongan_ar = potongan_ar_element.replace(',', '').replace(',', '')
                            .replace(',',
                                '')
                            .trim()

                        var potongan_bpd_element = $('#potongan_bpd').val()
                        var potongan_bpd = potongan_bpd_element.replace(',', '').replace(',', '')
                            .replace(
                                ',',
                                '').trim()

                        var potongan_bjb_element = $('#potongan_bjb').val()
                        var potongan_bjb = potongan_bjb_element.replace(',', '').replace(',', '')
                            .replace(
                                ',',
                                '').trim()

                        var potongan_cakti_buddhi_bhakti_element = $(
                            '#potongan_cakti_buddhi_bhakti').val()
                        var potongan_cakti_buddhi_bhakti = potongan_cakti_buddhi_bhakti_element
                            .replace(',',
                                '')
                            .replace(',', '')
                            .replace(',', '').trim()

                        var potongan_anak_asuh_element = $('#potongan_anak_asuh').val()
                        var potongan_anak_asuh = potongan_anak_asuh_element.replace(',', '')
                            .replace(',',
                                '')
                            .replace(',', '')
                            .trim()

                        var potongan_futsal_element = $('#potongan_futsal').val()
                        var potongan_futsal = potongan_futsal_element.replace(',', '').replace(',',
                                '')
                            .replace(
                                ',', '').trim()

                        var potongan_umum_element = $('#potongan_umum').val()
                        var potongan_umum = potongan_umum_element.replace(',', '').replace(',', '')
                            .replace(
                                ',',
                                '').trim()

                        var potongan_paguyuban_el = $('#potongan_paguyuban').val()
                        var potongan_paguyuban = potongan_paguyuban_el.replace(',', '').replace(',',
                                '')
                            .replace(',', '').trim()

                        var potongan_pinjaman_cbb_element = $('#potongan_pinjaman_cbb').val()
                        var potongan_pinjaman_cbb = potongan_pinjaman_cbb_element.replace(',', '')
                            .replace(
                                ',',
                                '').replace(',', '')
                            .trim()

                        var potongan_kop_bali_sedana_element = $('#potongan_kop_bali_sedana').val()
                        var potongan_kop_bali_sedana = potongan_kop_bali_sedana_element.replace(',',
                                '')
                            .replace(',', '').replace(
                                ',', '').trim()


                        var rapel_tukin_element = $('#rapel_tukin').val()
                        var rapel_tukin = rapel_tukin_element.replace(',', '').replace(',', '')
                            .replace(',',
                                '')
                            .trim()
                        
                        var potongantotaltukin_el = $('#potongantotaltukin').html()
                        var potongantotaltukin = potongantotaltukin_el.replace(',', '').replace(',', '').replace(',', '')
                            .trim()

                        if (potongan_absen == '' | tunj_setelah_pot_absen == '' |
                            potongan_dana_punia ==
                            '' |
                            potongan_mushola ==
                            '' | potongan_nasrani == '' |
                            potongan_ar == '' | potongan_bpd == '' | potongan_bjb == '' |
                            potongan_cakti_buddhi_bhakti == '' |
                            potongan_anak_asuh == '' |
                            potongan_futsal == '' | potongan_umum == '' | potongan_pinjaman_cbb ==
                            '' |
                            potongan_kop_bali_sedana ==
                            '' | rapel_tukin == '' | potongan_paguyuban == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terdapat Field Kosong! Isi dengan 0',
                            });
                        } else {

                            // PERHITUNGAN TUNJANGAN SETELAH POT. ABSEN
                            var perhitungan_tunj_setelah_absen = parseInt(tunjangan_kinerja) -
                                parseInt(
                                    potongan_absen)
                            var tunjangan_setelah_potongan_absen = $('#tunj_setelah_pot_absen').val(
                                perhitungan_tunj_setelah_absen)
                            if (/^[0-9.,]+$/.test($('#tunj_setelah_pot_absen').val())) {
                                $('#tunj_setelah_pot_absen').val(
                                    parseFloat($('#tunj_setelah_pot_absen').val().replace(/,/g,
                                        ''))
                                    .toLocaleString('en')
                                );
                            } else {
                                $('#tunj_setelah_pot_absen').val(
                                    $('#tunj_setelah_pot_absen')
                                    .val()
                                    .substring(0, $('#tunj_setelah_pot_absen').val().length - 1)
                                );
                            }

                            // PERHITUNGAN JUMLAH POTONGAN
                            var perhitungan_jumlah_potongan = parseInt(potongan_absen) + parseInt(
                                    potongan_dana_punia) + parseInt(
                                    potongan_mushola) +
                                parseInt(potongan_nasrani) + parseInt(potongan_ar) + parseInt(
                                    potongan_bpd) +
                                parseInt(
                                    potongan_bjb) +
                                parseInt(potongan_cakti_buddhi_bhakti) + parseInt(
                                    potongan_anak_asuh) +
                                parseInt(potongan_futsal) +
                                parseInt(potongan_umum) + parseInt(potongan_pinjaman_cbb) +
                                parseInt(
                                    potongan_kop_bali_sedana) +
                                parseInt(potongan_paguyuban) + parseInt(potongantotaltukin)
                            var potongan_jumlah = $('#potongan_jumlah').val(
                                perhitungan_jumlah_potongan)
                            if (/^[0-9.,]+$/.test($('#potongan_jumlah').val())) {
                                $('#potongan_jumlah').val(
                                    parseFloat($('#potongan_jumlah').val().replace(/,/g, ''))
                                    .toLocaleString('en')
                                );
                            } else {
                                $('#potongan_jumlah').val(
                                    $('#potongan_jumlah')
                                    .val()
                                    .substring(0, $('#potongan_jumlah').val().length - 1)
                                );
                            }

                            // TUKIN SETELAH POTONGAN
                            var perhitungan_tukin_setelah_potongan = parseInt(tunjangan_kinerja) -
                                parseInt(
                                    perhitungan_jumlah_potongan)
                            var tukin_setelah_potongan = $('#tukin_setelah_potongan2').val(
                                perhitungan_tukin_setelah_potongan)
                            if (/^[0-9.,]+$/.test($('#tukin_setelah_potongan2').val())) {
                                $('#tukin_setelah_potongan2').val(
                                    parseFloat($('#tukin_setelah_potongan2').val().replace(/,/g,
                                        ''))
                                    .toLocaleString('en')
                                );
                            } else {
                                $('#tukin_setelah_potongan2').val(
                                    $('#tukin_setelah_potongan2')
                                    .val()
                                    .substring(0, $('#tukin_setelah_potongan2').val().length -
                                        1)
                                );
                            }

                            // TOTAL TUKIN
                            var perhitungan_total_tukin = parseInt(rapel_tukin) + parseInt(
                                perhitungan_tukin_setelah_potongan)
                            var tukin_dibayarkan = $('#tukin_dibayarkan').val(
                                perhitungan_total_tukin)
                            if (/^[0-9.,]+$/.test($('#tukin_dibayarkan').val())) {
                                $('#tukin_dibayarkan').val(
                                    parseFloat($('#tukin_dibayarkan').val().replace(/,/g, ''))
                                    .toLocaleString('en')
                                );
                            } else {
                                $('#tukin_dibayarkan').val(
                                    $('#tukin_dibayarkan')
                                    .val()
                                    .substring(0, $('#tukin_dibayarkan').val().length - 1)
                                );
                            }
                        }
                    }
                }
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
                    title: 'Berhasil Mengedit Data Gaji Pegawai'
                })
            });

        }

    }

    function hitungpotongan(event) {
        var tunjangan_kinerja_element = $('#tunjangan_kinerja').val()
        var tunjangan_kinerja = tunjangan_kinerja_element.replace(',', '').replace(',', '').replace(',',
                '')
            .trim()

        if (tunjangan_kinerja == '' | tunjangan_kinerja == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tunjangan Kinerja Bernilai 0',
            });
        } else {
            var potongan_absen_element = $('#potongan_absen').val()
            var potongan_absen = potongan_absen_element.replace(',', '').replace(',', '').replace(',',
                    '')
                .trim()

            var tunj_setelah_pot_absen_element = $('#tunj_setelah_pot_absen').val()
            var tunj_setelah_pot_absen = tunj_setelah_pot_absen_element.replace(',', '').replace(',',
                    '')
                .replace(',',
                    '').trim()

            var potongan_dana_punia_element = $('#potongan_dana_punia').val()
            var potongan_dana_punia = potongan_dana_punia_element.replace(',', '').replace(',', '')
                .replace(',',
                    '')
                .trim()

            var potongan_mushola_element = $('#potongan_mushola').val()
            var potongan_mushola = potongan_mushola_element.replace(',', '').replace(',', '').replace(
                    ',', '')
                .trim()

            var potongan_nasrani_element = $('#potongan_nasrani').val()
            var potongan_nasrani = potongan_nasrani_element.replace(',', '').replace(',', '').replace(
                    ',', '')
                .trim()

            var potongan_ar_element = $('#potongan_ar').val()
            var potongan_ar = potongan_ar_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var potongan_bpd_element = $('#potongan_bpd').val()
            var potongan_bpd = potongan_bpd_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var potongan_bjb_element = $('#potongan_bjb').val()
            var potongan_bjb = potongan_bjb_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var potongan_cakti_buddhi_bhakti_element = $('#potongan_cakti_buddhi_bhakti').val()
            var potongan_cakti_buddhi_bhakti = potongan_cakti_buddhi_bhakti_element.replace(',', '')
                .replace(
                    ',', '')
                .replace(',', '').trim()

            var potongan_anak_asuh_element = $('#potongan_anak_asuh').val()
            var potongan_anak_asuh = potongan_anak_asuh_element.replace(',', '').replace(',', '')
                .replace(',',
                    '')
                .trim()

            var potongan_futsal_element = $('#potongan_futsal').val()
            var potongan_futsal = potongan_futsal_element.replace(',', '').replace(',', '').replace(',',
                    '')
                .trim()

            var potongan_umum_element = $('#potongan_umum').val()
            var potongan_umum = potongan_umum_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var potongan_paguyuban_el = $('#potongan_paguyuban').val()
            var potongan_paguyuban = potongan_paguyuban_el.replace(',', '').replace(',', '').replace(
                    ',', '')
                .trim()

            var potongan_pinjaman_cbb_element = $('#potongan_pinjaman_cbb').val()
            var potongan_pinjaman_cbb = potongan_pinjaman_cbb_element.replace(',', '').replace(',', '')
                .replace(
                    ',', '')
                .trim()

            var potongan_kop_bali_sedana_element = $('#potongan_kop_bali_sedana').val()
            var potongan_kop_bali_sedana = potongan_kop_bali_sedana_element.replace(',', '').replace(
                    ',', '')
                .replace(
                    ',', '').trim()


            var rapel_tukin_element = $('#rapel_tukin').val()
            var rapel_tukin = rapel_tukin_element.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            var potongantotaltukin_el = $('#potongantotaltukin').html()
            var potongantotaltukin = potongantotaltukin_el.replace(',', '').replace(',', '').replace(',', '')
                .trim()

            if (potongan_absen == '' | tunj_setelah_pot_absen == '' | potongan_dana_punia == '' |
                potongan_mushola ==
                '' | potongan_nasrani == '' |
                potongan_ar == '' | potongan_bpd == '' | potongan_bjb == '' |
                potongan_cakti_buddhi_bhakti ==
                '' |
                potongan_anak_asuh == '' |
                potongan_futsal == '' | potongan_umum == '' | potongan_pinjaman_cbb == '' |
                potongan_kop_bali_sedana ==
                '' | rapel_tukin == '' | potongan_paguyuban == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat Field Kosong! Isi dengan 0',
                });
            } else {

                // PERHITUNGAN TUNJANGAN SETELAH POT. ABSEN
                var perhitungan_tunj_setelah_absen = parseInt(tunjangan_kinerja) - parseInt(
                    potongan_absen)
                var tunjangan_setelah_potongan_absen = $('#tunj_setelah_pot_absen').val(
                    perhitungan_tunj_setelah_absen)
                if (/^[0-9.,]+$/.test($('#tunj_setelah_pot_absen').val())) {
                    $('#tunj_setelah_pot_absen').val(
                        parseFloat($('#tunj_setelah_pot_absen').val().replace(/,/g, ''))
                        .toLocaleString(
                            'en')
                    );
                } else {
                    $('#tunj_setelah_pot_absen').val(
                        $('#tunj_setelah_pot_absen')
                        .val()
                        .substring(0, $('#tunj_setelah_pot_absen').val().length - 1)
                    );
                }

                // PERHITUNGAN JUMLAH POTONGAN
                var perhitungan_jumlah_potongan = parseInt(potongan_absen) + parseInt(potongan_dana_punia) +
                    parseInt(potongan_mushola) + parseInt(potongan_nasrani) + parseInt(potongan_ar) + parseInt(potongan_bpd) +
                    parseInt(potongan_bjb) + parseInt(potongan_cakti_buddhi_bhakti) + parseInt(potongan_anak_asuh) + 
                    parseInt(potongan_futsal) + parseInt(potongan_umum) + parseInt(potongan_pinjaman_cbb) + 
                    parseInt(potongan_kop_bali_sedana) + parseInt(potongan_paguyuban) + parseInt(potongantotaltukin)
                var potongan_jumlah = $('#potongan_jumlah').val(perhitungan_jumlah_potongan)
                if (/^[0-9.,]+$/.test($('#potongan_jumlah').val())) {
                    $('#potongan_jumlah').val(
                        parseFloat($('#potongan_jumlah').val().replace(/,/g, '')).toLocaleString(
                            'en')
                    );
                } else {
                    $('#potongan_jumlah').val(
                        $('#potongan_jumlah')
                        .val()
                        .substring(0, $('#potongan_jumlah').val().length - 1)
                    );
                }

                // TUKIN SETELAH POTONGAN
                var perhitungan_tukin_setelah_potongan = parseInt(tunjangan_kinerja) - parseInt(
                    perhitungan_jumlah_potongan)
                var tukin_setelah_potongan = $('#tukin_setelah_potongan2').val(
                    perhitungan_tukin_setelah_potongan)
                if (/^[0-9.,]+$/.test($('#tukin_setelah_potongan2').val())) {
                    $('#tukin_setelah_potongan2').val(
                        parseFloat($('#tukin_setelah_potongan2').val().replace(/,/g, ''))
                        .toLocaleString(
                            'en')
                    );
                } else {
                    $('#tukin_setelah_potongan2').val(
                        $('#tukin_setelah_potongan2')
                        .val()
                        .substring(0, $('#tukin_setelah_potongan2').val().length - 1)
                    );
                }

                // TOTAL TUKIN
                var perhitungan_total_tukin = parseInt(rapel_tukin) + parseInt(
                    perhitungan_tukin_setelah_potongan)
                var tukin_dibayarkan = $('#tukin_dibayarkan').val(perhitungan_total_tukin)
                if (/^[0-9.,]+$/.test($('#tukin_dibayarkan').val())) {
                    $('#tukin_dibayarkan').val(
                        parseFloat($('#tukin_dibayarkan').val().replace(/,/g, '')).toLocaleString(
                            'en')
                    );
                } else {
                    $('#tukin_dibayarkan').val(
                        $('#tukin_dibayarkan')
                        .val()
                        .substring(0, $('#tukin_dibayarkan').val().length - 1)
                    );
                }



                // // TUNJANGAN KINERJA EDIT GAJI
                // var tunjangan_kinerja_element = $('#tunjangan_kinerja').val(perhitungan_total_tukin)
                // if (/^[0-9.,]+$/.test($('#tunjangan_kinerja').val())) {
                // $('#tunjangan_kinerja').val(
                //     parseFloat($('#tunjangan_kinerja').val().replace(/,/g, '')).toLocaleString('en')
                // );
                // } else {
                //     $('#tunjangan_kinerja').val(
                //         $('#tunjangan_kinerja')
                //         .val()
                //         .substring(0, $('#tunjangan_kinerja').val().length - 1)
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
    }

    $(document).ready(function () {
        // $('#dataTableUtama').dataTable();
        // $('#dataTablePotongan').dataTable();

        var template = $('#template_delete_button_utama').html()
        $('#dataTableUtama').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });

        var template2 = $('#template_delete_button_potongan').html()
        $('#dataTablePotongan').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template2
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });
    });

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

</script>

@endsection
