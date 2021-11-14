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
                            Edit Data Pegawai {{ $item->User->nama_pegawai }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('gaji.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mr-3">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Data Gaji Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab" aria-controls="example" aria-selected="false">Potongan - Potongan</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
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
                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                id="tunjangan_istrisuami"
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
                                            <input type="text" class="form-control form-control-sm number-separator tes"
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
                                            <input type="text" class="form-control form-control-sm number-separator tes"
                                                id="tunjangan_jabatan_fungsional"
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
                                                id="tunjangan_umum" name="tunjangan_umum"
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
                                                id="tunjangan_beras" name="tunjangan_beras"
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
                                        <label for="iuran_wajib" class="col-sm-5 col-form-label col-form-label-sm">1. Iuran
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
                                        <label for="bpjs" class="col-sm-5 col-form-label col-form-label-sm"> 2. BPJS</label>
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
                                        <label for="sewa_rumah" class="col-sm-5 col-form-label col-form-label-sm">3. Sewa
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
                                        <label for="pph_pasal_21" class="col-sm-5 col-form-label col-form-label-sm"> 4. PPh
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
                                                id="jumlah_potongan" name="jumlah_potongan"
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
                                                id="jumlah_bersih_gaji"
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
                                                id="tunjangan_kinerja" name="tunjangan_kinerja"
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
                                                id="jumlah_potongan_lainnya"
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
                                                name="id_user" id="namates">
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
                                                id="penerimaan_total" name="penerimaan_total"
                                                value="{{ number_format($item->penerimaan_total) ?? '0' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                        <div class="px-2">    
                        <div class="row">
                                <div class="col-6">
                                    <div class="text-left">
                                        <p class="font-italic small">Potongan-potongan :</p>
                                    </div>
                                </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <p class="font-italic small">Jumlah Tunjangan Kinerja (IDR) :Rp. <span id="tunjangankinerjatext">{{ number_format($item->tunjangan_kinerja) ?? '0' }}</span></p>
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
                                                    id="potongan_absen_persen" name="potongan_absen_persen"
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
                                                <input type="text" class="form-control form-control-sm number-separator tes"
                                                    id="tunj_setelah_pot_absen"
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
                                                <input type="text" class="form-control form-control-sm number-separator tes"
                                                    id="potongan_mushola"
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
                                                    id="potongan_nasrani"
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
                                                    id="potongan_ar" name="potongan_ar"
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
                                                    id="potongan_bpd" name="potongan_bpd"
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
                                                    id="potongan_bjb" name="potongan_bjb"
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
                                                    id="potongan_cakti_buddhi_bhakti" name="potongan_cakti_buddhi_bhakti"
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
                                                    id="potongan_anak_asuh" name="potongan_anak_asuh"
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
                                                    id="potongan_futsal" name="potongan_futsal"
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
                                                    id="potongan_umum" name="potongan_umum"
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
                                                    id="potongan_paguyuban" name="potongan_paguyuban"
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
                                                    id="potongan_pinjaman_cbb" name="potongan_pinjaman_cbb"
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
                                                    id="potongan_kop_bali_sedana" name="potongan_kop_bali_sedana"
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
                                                    id="tukin_setelah_potongan2" name="tukin_setelah_potongan2"
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
                                                    id="potongan_jumlah"
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
                                                    id="rapel_tukin" name="rapel_tukin"
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
                                                    id="tukin_dibayarkan"
                                                    name="tukin_dibayarkan"
                                                    value="{{ number_format($item->tukin_dibayarkan) ?? '0' }}">
                                            </div>
                                            <div class="col-sm-3">
                                                <button class="btn btn-sm btn-primary" type="button" onclick="tambahpotongan(event,)">Hitung</button>
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
            <button class="btn btn-sm btn-primary" type="button" onclick="hitung(event)">Save changes</button>
        </div>
    </div>
</main>


@endsection
