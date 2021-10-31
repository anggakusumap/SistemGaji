<?php

namespace App\Http\Controllers\Admin\Penggajian;

use App\Http\Controllers\Controller;
use App\Imports\FileImport;
use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class GajiControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gaji = Gajipegawai::with('Detailgaji')->get();

        $gaji = Gajipegawai::withCount('Detailgaji')->get();
      

       
      

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.admin.gaji.index', compact('today','tanggal','gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $gaji = new Gajipegawai;
        $gaji->bulan_gaji = Carbon::create($request->bulan_gaji)->startOfMonth();
        $gaji->save();

       
       

      

        if ($request->hasFile('excel')!=null) {
            $import_file = $request->file('excel');
        }

        Excel::import(new FileImport, $import_file);


        // $file = $request->file('file');
        // Excel::import(new FileImport, $file);
        // Excel::import(new FileImport, request()->file('file'));
        // Excel::import(new FileImport, public_path('/DataPegawai/'.$namaFile));
    

        return back()->withStatus('Excel File Imported successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gaji = Gajipegawai::find($id);
        $gaji->delete();

        return redirect()->back()->with('messagehapus','Berhasil Menghapus Data Gaji Pegawai');
    }
}
