<?php

namespace App\Http\Controllers\Admin\Penggajian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\Gajistore;
use App\Imports\FileImport;
use App\Imports\UpdateImport;
use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
use File;
use Carbon\Carbon;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function storepenerimaanlain(Request $request, $id_gaji_pegawai)
    {
        $gaji = Gajipegawai::find($id_gaji_pegawai);
        $tempgrand = 0;

        $detail = Excel::toCollection(new UpdateImport(), $request->file('excelupdate'));
        foreach($detail[0] as $tes){
            $aw = DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->where('nama', $tes['nama'])->first();
            $temp = $aw->penerimaan_total - $aw->jumlah_potongan_lainnya;
            $gas = $temp + $tes['penerimaanlainlain'];

            DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->where('nama', $tes['nama'] )->update([
                'jumlah_potongan_lainnya' => $tes['penerimaanlainlain']?? 0,
                'penerimaan_total' => $temp + $tes['penerimaanlainlain'],
            ]);

            Gajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->update([
                'grand_total_gaji' => $temp + $tes['penerimaanlainlain']
            ]);
            
            $tempgrand = $tempgrand + $gas;
        }

        

        $gaji->grand_total_gaji = $tempgrand;
        $gaji->save();



        return redirect()->route('gaji.show', $gaji->id_gaji_pegawai)->with('message', ' Import File Excel Penerimaan Lain-Lain Berhasil Dilakukan');;


        // return redirect()->route('gajieditpenerimaanlain', $gaji->id_gaji_pegawai)->with('message', ' Import File Excel Penerimaan Lain-Lain Berhasil Dilakukan');
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

    public function edit2($id)
    {
        $gaji = Gajipegawai::with('Detailgaji.User')->withCount('Detailgaji')->find($id);
        $pegawai = User::all();

        return view('pages.admin.gaji.edit', compact('gaji','pegawai'));
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
        }

        $gaji->grand_total_gaji = $temp;
        $gaji->status_penerimaan = 'Belum Diterima';
        $gaji->save();

       
        $gaji->Detailpegawai()->sync($request->detailgaji);
      
        return $request;
    }

    public function update2(Request $request, $id_gaji_pegawai)
    {
        $gaji = Gajipegawai::findOrFail($id_gaji_pegawai);
        
        $temp = 0;
       
        foreach($request->detailgaji as $key=>$item){
            $temp = $temp + $item['penerimaan_total'];
        }
        
        $gaji->grand_total_gaji = $temp;
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

    public function getFile(){
      
        $path = public_path('pdf/excel_format_penggajian.xlsx');
        return response()->download($path);
      
    }
}
