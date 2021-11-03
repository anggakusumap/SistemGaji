<?php

namespace App\Http\Controllers\Admin\Penggajian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\Gajistore;
use App\Imports\FileImport;
use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Gajistore $request)
    {
        // return $request;

        $data = Gajipegawai::where('bulan_gaji', Carbon::create($request->bulan_gaji)->startOfMonth())->first();

        if (empty($data)){
            $gaji = new Gajipegawai;
            $gaji->bulan_gaji = Carbon::create($request->bulan_gaji)->startOfMonth();
            $gaji->save();
    
            if ($request->hasFile('excel')!=null) {
                $import_file = $request->file('excel');
            }
            Excel::import(new FileImport, $import_file);
            return redirect()->route('gaji.edit', $gaji->id_gaji_pegawai)->with('message', ' Import File Excel Berhasil Dilakukan');
        }else{
            return redirect()->back()->with('error_code', 5)->withErrors(['msg' => 'Error!Tahun dan Bulan Gaji Sudah Dibayarkan']);;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gaji = Gajipegawai::with('Detailgaji')->withCount('Detailgaji')->find($id);

        return view('pages.admin.gaji.detail', compact('gaji'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gaji = Gajipegawai::with('Detailgaji.User')->withCount('Detailgaji')->find($id);
        $pegawai = User::all();

        return view('pages.admin.gaji.create', compact('gaji','pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_gaji_pegawai)
    {
        $gaji = Gajipegawai::findOrFail($id_gaji_pegawai);
        
        $temp = 0;
        $tes = DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->delete();
  

        foreach($request->detailgaji as $key=>$item){
            $temp = $temp + $item['penerimaan_total'];
            // $gaji->Detailpegawai()->wherePivot('id_gaji_pegawai', $item['id_gaji_pegawai'])
            // ->detach($item);

        }
        $gaji->grand_total_gaji = $temp;
        $gaji->status_penerimaan = 'Belum Diterima';
        $gaji->save();

       
        $gaji->Detailpegawai()->sync($request->detailgaji);
      
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_gaji_pegawai)
    {
        $gaji = Gajipegawai::find($id_gaji_pegawai);
        DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->delete();
        $gaji->delete();

        return redirect()->back()->with('messagehapus','Berhasil Menghapus Data Gaji Pegawai');
    }
}
