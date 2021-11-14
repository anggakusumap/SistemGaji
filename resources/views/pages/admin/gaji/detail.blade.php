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
                        <span id="idgajipegawai" style="display: none">{{ $gaji->id_gaji_pegawai }}</span>
                        <span class="font-weight-500 text-gray">Tahun </span>
                        {{ date('Y', strtotime($gaji->bulan_gaji)) }} ·
                        <span class="font-weight-500 text-gray ml-2">Bulan </span>
                        {{ date('F', strtotime($gaji->bulan_gaji)) }} ·

                        <p class="font-weight-500 text-gray">Jumlah Pegawai · <span
                                class="font-weight-500 text-primary">{{ $gaji->detailgaji_count }} Orang</span> </p>

                                
                        <p class="font-weight-500 text-gray">Total Penerimaan Keseluruhan · <span
                            class="font-weight-500 text-primary">Rp. {{ number_format($sum,2,',','.') }}</span> </p>
                        <p class="small">Petunjuk: Klik button <b>detail</b> untuk melihat dan mengedit detail gaji
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
                                                style="width: 60px;">Jumlah Kotor</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Jumlah Potongan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Tukin Dibayarkan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Jumlah Bersih</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Penerimaan Lain-Lain</th>
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
                                        @if ($item->User == '')
                                            <tr role="row" class="odd" style="color: red">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                <td style="color: red">Pegawai Tidak Ditemukan!! Edit Data</td>
                                                <td>{{ number_format($item->jumlah_kotor) }}</td>
                                                <td>{{ number_format($item->jumlah_potongan) }}</td>
                                                <td>{{ number_format($item->tukin_dibayarkan) }}</td>
                                                <td>{{ number_format($item->jumlah_bersih_gaji) }}</td>
                                                <td>{{ number_format($item->jumlah_potongan_lainnya) }}</td>
                                                <td>{{ number_format($item->penerimaan_total) }}</td>
                                                <td>
                                                    <a href="{{ route('gajishowedit', $item->id_detail_gaji) }}" class="btn-xs btn-secondary  mr-2" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail dan Edit">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                                    <button class="btn-xs btn-danger deleteRecord" data-id="{{ $item->id_detail_gaji }}" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data Gaji Pegawai">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        @else
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->User->nama_pegawai }}</td>
                                            <td>{{ number_format($item->jumlah_kotor) }}</td>
                                            <td>{{ number_format($item->jumlah_potongan) }}</td>
                                            <td>{{ number_format($item->tukin_dibayarkan) }}</td>
                                            <td>{{ number_format($item->jumlah_bersih_gaji) }}</td>
                                            <td>{{ number_format($item->jumlah_potongan_lainnya) }}</td>
                                            <td>{{ number_format($item->penerimaan_total) }}</td>
                                            <td>
                                                <a href="{{ route('gajishowedit', $item->id_detail_gaji) }}" class="btn-xs btn-secondary  mr-2" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail dan Edit">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <button class="btn-xs btn-danger deleteRecord" data-id="{{ $item->id_detail_gaji }}" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data Gaji Pegawai">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                             
                                              
                                            </td>
                                        </tr>
                                        @endif
                                        
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



<script>

    $(".deleteRecord").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var id_gaji_pegawai = $('#idgajipegawai').html();

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
                $.ajax(
                {
                    url: '/gaji/' + id + '/deletedata',
                    type: 'post',
                    data: {
                        id: id,
                        _token: token,
                    },
                    success: function (){
                        console.log("it Works")
                        window.location.href = '/gaji/' + id_gaji_pegawai
                        
                    },
                    error: function (response) {
                            console.log(response)
                        
                        }
                });

                swal.fire({
                    icon: 'success',
                    html: '<h5>Deleted!</h5>'
                });
            }
        })

       

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
