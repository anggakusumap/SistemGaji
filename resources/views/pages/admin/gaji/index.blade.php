@extends('layouts.admindashboard')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Data Gaji Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock">12:16 PM</span>
                </div>
            </div>
            <div class="small">


                <hr>
                </hr>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Gaji Pegawai
                    <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">
                        Tambah Data
                    </a>
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
                                                style="width: 40px;">Tahun Gaji</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Bulan Gaji</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 80px;">Jumlah Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 150px;">Grand Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 50px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 70px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gaji as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ date('Y', strtotime($item->bulan_gaji)) }}</td>
                                            <td>{{ date('F', strtotime($item->bulan_gaji)) }}</td>
                                            <td>{{ $item->detailgaji_count }} Orang</td>
                                            <td>Rp. {{ number_format($item->grand_total_gaji,2,',','.') }}</td>
                                            <td>{{ $item->status_penerimaan }}</td>
                                            <td>
                                                <a href="{{ route('gaji.show', $item->id_gaji_pegawai) }}"
                                                    class="btn btn-secondary btn-datatable">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('gaji.edit', $item->id_gaji_pegawai) }}"
                                                    class="btn btn-primary btn-datatable">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_gaji_pegawai }}">
                                                    <i class="fas fa-trash"></i>
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

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Gaji Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji.store') }}" id="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isi Formulir Berikut</label>

                    @if($errors->any())
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-times"></i>
                        {{$errors->first()}}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="bulan_gaji">Bulan dan Tahun Bayar</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" id="bulan_gaji" type="month" name="bulan_gaji" value="{{ old('bulan_gaji') }}" required>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="excel">Upload File Excel</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" id="excel" type="file" name="excel" accept=".xlsx, .xls, .csv"
                            value="{{ old('excel') }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Selanjutnya!</button>
                </div>
            </form>
        </div>
    </div>
</div>

@forelse ($gaji as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_gaji_pegawai }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji.destroy', $item->id_gaji_pegawai) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">Apakah Anda Yakin Menghapus Data Gaji Pegawai pada Bulan
                    <b>{{ date('F', strtotime($item->bulan_gaji)) }} </b> , Tahun
                    <b>{{ date('Y', strtotime($item->bulan_gaji)) }}</b> ?
                </div>
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



@if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date()
        var hrs = time.getHours()
        var min = time.getMinutes()
        var sec = time.getSeconds()
        var en = 'AM';

        if (hrs > 12) {
            en = 'PM'
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (hrs == 0) {
            hrs = 12;
        }

        if (hrs < 10) {
            hrs = '0' + hrs;
        }

        if (min < 10) {
            min = '0' + min;
        }

        if (sec <  10) {
            sec = '0' + sec;
        }

        document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

    // function submit1(event) {
    //     var _token = $('#form').find('input[name="_token"]').val()
    //     var bulan_gaji = $('#bulan_gaji').val()
    //     var excel = $('#excel').val()

    //     var data = {
    //         _token: _token,
    //         bulan_gaji: bulan_gaji,
    //         excel: excel
    //     }

    //     if (bulan_gaji == '' | bulan_gaji == 0 ) {
    //         $('#alertbulan').show()
    //     }else if (excel == '' | excel == 0) {
    //         $('#alertexcel').show()
    //     } else {
    //         $.ajax({
    //             method: 'post',
    //             url: "/gaji",
    //             data: data,
    //             success: function (response) {
    //                 window.location.href = '/gaji/' + response.id_gaji_pegawai + '/edit'
    //             },
    //             error: function (error) {
    //                 console.log(error)
    //                 alert(error.responseJSON.message)
    //             }

    //         });
    //     }

    // };

</script>

@endsection
