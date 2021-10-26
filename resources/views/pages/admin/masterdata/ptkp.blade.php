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
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Master Data PTKP
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List PTKP
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah PTKP</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
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
                    {{-- SHOW ENTRIES --}}
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
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Kode PTKP</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Nama PTKP</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Besaran PTKP</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ptkp as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->kode_ptkp }}</td>
                                            <td>{{ $item->nama_ptkp }}</td>
                                            <td>Rp. {{ number_format($item->besaran_ptkp) }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_ptkp }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_ptkp }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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

{{-- MODAL TAMBAH --------------------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data PTKP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('master-ptkp.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_ptkp">Kode PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_ptkp" type="text" id="kode_ptkp"
                            placeholder="Input Kode PTKP" value="{{ old('kode_ptkp') }}"
                            class="form-control @error('kode_ptkp') is-invalid @enderror" />
                        @error('kode_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_ptkp">Nama PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_ptkp" type="text" id="nama_ptkp"
                            placeholder="Input Nama PTKP" value="{{ old('nama_ptkp') }}"
                            class="form-control @error('nama_ptkp') is-invalid @enderror" />
                        @error('nama_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                <label class="small mb-1 mr-1" for="besaran_ptkp">Besaran PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <div class="small text-lg-right">
                                    <span class="font-weight-500 text-primary">Nominal : </span>
                                    <span id="detailbesaranptkp"></span>
                                </div>
                            </div>
                        </div>
                        <input class="form-control" name="besaran_ptkp" type="number" id="besaran_ptkp"
                            placeholder="Input Besaran PTKP" value="{{ old('besaran_ptkp') }}"
                            class="form-control @error('besaran_ptkp') is-invalid @enderror" />
                        @error('besaran_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                {{-- Validasi Error --}}
                @if (count($errors) > 0)
                @endif
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL EDIT ---------------------------------------------------------------------------------------------}}
@forelse ($ptkp as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_ptkp }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit PTKP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('master-ptkp.update', $item->id_ptkp) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_ptkp">Kode PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_ptkp" type="text" id="kode_ptkp"
                            placeholder="Input Kode PTKP" value="{{ $item->kode_ptkp }}"
                            class="form-control @error('kode_ptkp') is-invalid @enderror" />
                        @error('kode_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_ptkp">Nama PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_ptkp" type="text" id="nama_ptkp"
                            placeholder="Input Nama PTKP" value="{{ $item->nama_ptkp }}"
                            class="form-control @error('nama_ptkp') is-invalid @enderror" />
                        @error('nama_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                <label class="small mb-1 mr-1" for="besaran_ptkp">Besaran PTKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <div class="small text-lg-right">
                                    <span class="font-weight-500 text-primary">Nominal : </span>
                                    <span id="detailgajiedit" class="detailgajiedit">Rp.{{ number_format($item->besaran_ptkp,2,',','.')}}</span>
                                </div>
                            </div>
                        </div>
                        <input class="form-control edit_ptkp" name="besaran_ptkp" type="number" id="besaran_ptkp"
                            placeholder="Input Besaran PTKP" value="{{ $item->besaran_ptkp }}"
                            class="form-control @error('besaran_ptkp') is-invalid @enderror" />
                        @error('besaran_ptkp')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($ptkp as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_ptkp }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('master-ptkp.destroy', $item->id_ptkp) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">Apakah Anda Yakin Menghapus Data PTKP <b>{{ $item->nama_ptkp }}</b> ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


{{-- Callback Modal Jika Validasi Error --}}
@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('#besaran_ptkp').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailbesaranptkp').html(nominal_fix);
        })

        $('.edit_ptkp').each(function () {
            $(this).on('input', function () {
                var harga = $(this).val()
                var harga_fix = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(harga)
                var harga_paling_fix = $(this).parent().find('.detailgajiedit')
                $(harga_paling_fix).html(harga_fix);
            })
        })
    });

</script>

@endsection
