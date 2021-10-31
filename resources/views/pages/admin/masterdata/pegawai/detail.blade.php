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
                            Data Pegawai {{ $user->nama_pegawai }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('master-pegawai.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="card">
           
            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-8 col-xl-10">
                                @if(session('messageberhasil'))
                                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                    {{ session('messageberhasil') }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                <h3 class="text-primary">Informasi Pegawai</h3>
                                <h5 class="card-title">Input Formulir Data Diri Pegawai</h5>
                                <form action="{{ route('master-pegawai.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label class="small mb-1 mr-1" for="nama_pegawai">Nama Lengkap Pegawai</label>
                                            <input class="form-control" id="nama_pegawai" type="text" name="nama_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->nama_pegawai }}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="nip_pegawai">NIP Pegawai</label>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->nip_pegawai }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="pangkat">Pangkat</label>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->pangkat }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="golongan">Golongan</label>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->golongan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis
                                                Kelamin</label>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->jenis_kelamin }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="no_telp">Phone number</label>
                                                <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->no_telp }}" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-primary">Akun Pegawai</h4>
                                    <h5 class="card-title">Input Formulir Akun Pegawai</h5>
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="email">Email Pegawai</label>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                            placeholder="Input Nama Lengkap Pegawai" value="{{ $user->email }}" readonly>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="username">Username</label>
                                                <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->username }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="password">Password</label>
                                                <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input Nama Lengkap Pegawai" value="{{ $user->password }}" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
