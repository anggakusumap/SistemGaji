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
                            Tambah Data Pegawai
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

    <div class="container-fluid mr-3">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-user"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Identitas</div>
                            <div class="wizard-step-text-details">Formulir Identitas Diri</div>
                        </div>
                    </a>
                    </a>
                </div>
            </div>
            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-8 col-xl-9">
                                @if(session('messageberhasil'))
                                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                    {{ session('messageberhasil') }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif

                                <form action="{{ route('master-pegawai.store') }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-8">
                                            <label class="small mb-1 mr-1" for="nama_pegawai">Nama Lengkap
                                                Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_pegawai" type="text"
                                                name="nama_pegawai" placeholder="Input Nama Lengkap Pegawai"
                                                value="{{ old('nama_pegawai') }}"
                                                class="form-control @error('nama_pegawai') is-invalid @enderror" />
                                            @error('nama_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="nip_pegawai">NIP Pegawai</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nip_pegawai" type="text" name="nip_pegawai"
                                                placeholder="Input NIP Pegawai" value="{{ old('nip_pegawai') }}"
                                                class="form-control @error('nip_pegawai') is-invalid @enderror" />
                                            @error('nip_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="pangkat">Pangkat</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="pangkat" id="pangkat" class="form-control"
                                                value="{{ old('pangkat') }}"
                                                class="form-control @error('pangkat') is-invalid @enderror">
                                                <option value="{{ old('pangkat')}}"> Pilih Pangkat</option>
                                                <option value="Juru Muda">Juru Muda</option>
                                                <option value="Juru Muda Tingkat I">Juru Muda Tingkat I</option>
                                                <option value="Juru">Juru</option>
                                                <option value="Pengatur Muda">Pengatur Muda</option>
                                                <option value="Pengatur Muda Tingkat I">Pengatur Muda Tingkat I</option>
                                                <option value="Pengatur">Pengatur</option>
                                                <option value="Pengatur Tingkat I">Pengatur Tingkat I</option>
                                                <option value="Penata Muda">Penata Muda</option>
                                                <option value="Penata Muda Tingkat I">Penata Muda Tingkat I</option>
                                                <option value="Penata">Penata</option>
                                                <option value="Penata Tingkat I">Penata Tingkat I</option>
                                                <option value="Pembina">Pembina</option>
                                                <option value="Pembina Tingkat I">Pembina Tingkat I</option>
                                                <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                                                <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                                                <option value="Pembina Utama">Pembina Utama</option>

                                            </select>
                                            @error('pangkat')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="golongan">Golongan</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="golongan" id="golongan" class="form-control"
                                                value="{{ old('golongan') }}"
                                                class="form-control @error('golongan') is-invalid @enderror">
                                                <option value="{{ old('golongan')}}"> Pilih Golongan</option>
                                                <option value="Ia">Ia</option>
                                                <option value="Ib">Ib</option>
                                                <option value="Ic">Ic</option>
                                                <option value="Id">Id</option>
                                                <option value="IIa">IIa</option>
                                                <option value="IIb">IIb</option>
                                                <option value="IIc">IIc</option>
                                                <option value="IId">IId</option>
                                                <option value="IIIa">IIIa</option>
                                                <option value="IIIb">IIIb</option>
                                                <option value="IIIc">IIIc</option>
                                                <option value="IIId">IIId</option>
                                                <option value="IVa">IVa</option>
                                                <option value="IVb">IVb</option>
                                                <option value="IVc">IVc</option>
                                                <option value="IVd">IVd</option>
                                                <option value="IVe">IVe</option>
                                            </select>
                                            @error('golongan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis
                                                Kelamin</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
                                                value="{{ old('jenis_kelamin') }}"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="{{ old('jenis_kelamin')}}"> Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="no_telp">Phone number</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="no_telp" name="no_telp" type="number"
                                                placeholder="+62" value="{{ old('no_telp') }}"
                                                class="form-control @error('no_telp') is-invalid @enderror" />
                                            @error('no_telp')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="text-primary mt-5">Akun Pegawai</h5>
                                    <h6 class="card-title mb-2">Input Formulir Akun Pegawai</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="small mb-1 mr-1" for="email">Email</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Input Email Pegawai" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" />
                                            @error('email')
                                            <div class="text-danger small mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="username">Username</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="username" type="text" name="username"
                                                placeholder="Input Username Pegawai" value="{{ old('username') }}"
                                                class="form-control @error('username') is-invalid @enderror" />
                                            @error('username')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="role">Role</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="role" id="role" class="form-control"
                                                value="{{ old('role') }}"
                                                class="form-control @error('role') is-invalid @enderror">
                                                <option value="{{ old('role')}}"> Pilih Hak Akses</option>
                                                <option value="PEGAWAI">Pegawai</option>
                                                <option value="ADMIN">Admin</option>
                                            </select>
                                            @error('role')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Input Password" name="password" required
                                                autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password-confirm" class="d-block">Password Confirmation</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="Input Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>


                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('master-pegawai.index') }}" class="btn btn-light"
                                            type="button">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
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
