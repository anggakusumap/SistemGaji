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

        $data = Gajipegawai::where('bulan_gaji', Carbon::create($request->bulan_gaji)->startOfMonth())->first();

        if (empty($data)){
            $gaji = new Gajipegawai;
            $gaji->bulan_gaji = Carbon::create($request->bulan_gaji)->startOfMonth();
            $gaji->status_penerimaan_lain = 'Belum Ditambahkan';
            $gaji->save();
    
            if ($request->hasFile('excel')!=null) {
                $import_file = $request->file('excel');
            }
            Excel::import(new FileImport, $import_file);
            return redirect()->route('gaji.show', $gaji->id_gaji_pegawai)->with('message', ' Import File Excel Berhasil Dilakukan');
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
           
            if (empty($aw)){
                continue;
            }else{
                $temp = $aw->penerimaan_total - $aw->jumlah_potongan_lainnya;
                $lainnya = $aw->jumlah_potongan_lainnya;
                $gas = $temp + $lainnya + $tes['penerimaanlainlain']?? 0;
    
                DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->where('nama', $tes['nama'] )->update([
                    'jumlah_potongan_lainnya' => $lainnya + $tes['penerimaanlainlain']?? 0,
                    'penerimaan_total' => $temp + $lainnya + $tes['penerimaanlainlain'] ?? 0,
                ]);
    
                Gajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->update([
                    'grand_total_gaji' => $temp + $tes['penerimaanlainlain']?? 0,
                ]);
                $tempgrand = $tempgrand + $gas;
            } 
        }

        $gaji->grand_total_gaji = $tempgrand;
        // $gaji->status_penerimaan_lain = 'Sudah Ditambahkan';
        $gaji->save();
        
        return redirect()->route('gaji.show', $gaji->id_gaji_pegawai)->with('message', ' Import File Excel Penerimaan Lain-Lain Berhasil Dilakukan');
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
        $sum = DetailGajipegawai::where('id_gaji_pegawai', $id)->sum('penerimaan_total');
        return view('pages.admin.gaji.detail', compact('gaji','sum'));
    }

    public function showedit($id)
    {
        $item = DetailGajipegawai::with('Gaji')->find($id);
        $pegawai = User::get();

        return view('pages.admin.gaji.detailedit', compact('item','pegawai'));
    }

    public function showupdate(Request $request, $id_detail_gaji)
    {
        $gaji = DetailGajipegawai::with('Gaji')->findOrFail($id_detail_gaji);
        
        $gaji->gaji_pokok = $request->gaji_pokok;
        $gaji->tunjangan_istrisuami = $request->tunjangan_istrisuami;
        $gaji->tunjangan_anak = $request->tunjangan_anak;
        $gaji->tunjangan_jabatan_struktural = $request->tunjangan_jabatan_struktural;
        $gaji->tunjangan_jabatan_fungsional = $request->tunjangan_jabatan_fungsional;
        $gaji->tunjangan_umum = $request->tunjangan_umum;
        $gaji->tunjangan_beras = $request->tunjangan_beras;
        $gaji->tunjangan_pph = $request->tunjangan_pph;
        $gaji->pembulatan = $request->pembulatan;
        $gaji->jumlah_kotor = $request->jumlah_kotor;
        $gaji->iuran_wajib = $request->iuran_wajib;
        $gaji->bpjs = $request->bpjs;
        $gaji->sewa_rumah = $request->sewa_rumah;
        $gaji->pph_pasal_21 = $request->pph_pasal_21;
        $gaji->jumlah_potongan = $request->jumlah_potongan;
        $gaji->jumlah_bersih_gaji = $request->jumlah_bersih_gaji;
        $gaji->tunjangan_kinerja = $request->tunjangan_kinerja;
        $gaji->jumlah_potongan_lainnya = $request->jumlah_potongan_lainnya;
        $gaji->id = $request->id;
        $gaji->penerimaan_total = $request->penerimaan_total;
        $gaji->potongan_absen_persen = $request->potongan_absen_persen;
        $gaji->potongan_absen = $request->potongan_absen;
        $gaji->tunj_setelah_pot_absen = $request->tunj_setelah_pot_absen;
        $gaji->potongan_dana_punia = $request->potongan_dana_punia;
        $gaji->potongan_mushola = $request->potongan_mushola;
        $gaji->potongan_nasrani = $request->potongan_nasrani;
        $gaji->potongan_ar = $request->potongan_ar;
        $gaji->potongan_bpd = $request->potongan_bpd;
        $gaji->potongan_bjb = $request->potongan_bjb;
        $gaji->potongan_cakti_buddhi_bhakti = $request->potongan_cakti_buddhi_bhakti;
        $gaji->potongan_anak_asuh = $request->potongan_anak_asuh;
        $gaji->potongan_futsal = $request->potongan_futsal;
        $gaji->potongan_umum = $request->potongan_umum;
        $gaji->potongan_paguyuban = $request->potongan_paguyuban;
        $gaji->potongan_pinjaman_cbb = $request->potongan_pinjaman_cbb;
        $gaji->potongan_kop_bali_sedana = $request->potongan_kop_bali_sedana;
        $gaji->tukin_setelah_potongan2 = $request->tukin_setelah_potongan2;
        $gaji->potongan_jumlah = $request->potongan_jumlah;
        $gaji->rapel_tukin = $request->rapel_tukin;
        $gaji->tukin_dibayarkan = $request->tukin_dibayarkan;
        $gaji->save();

        return $request;

        
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
        // $gaji = Gajipegawai::findOrFail($id_gaji_pegawai);
        
        // $temp = 0;
        // $tes = DetailGajipegawai::where('id_gaji_pegawai', $id_gaji_pegawai)->delete();
  

        // foreach($request->detailgaji as $key=>$item){
        //     $temp = $temp + $item['penerimaan_total'];
        // }

        // $gaji->grand_total_gaji = $temp;
        // $gaji->status_penerimaan = 'Belum Diterima';
        // $gaji->save();

        // $gaji->Detailpegawai()->sync($request->detailgaji);
      
        // return $request;
    }

    public function update2(Request $request, $id_gaji_pegawai)
    {
       
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

    public function deletedetail($id_detail_gaji)
    {
        $tes = DetailGajipegawai::find($id_detail_gaji);
        $tes->delete();

        return redirect()->back()->with('messagehapus','Berhasil Menghapus Data Gaji Pegawai');
    }

    public function getFile(){
      
        $path = public_path('pdf/excel_format_penggajian.xlsx');
        return response()->download($path);
      
    }
}
