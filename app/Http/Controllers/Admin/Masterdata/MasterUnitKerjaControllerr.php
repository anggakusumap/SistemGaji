<?php

namespace App\Http\Controllers\Admin\Masterdata;

use App\Http\Controllers\Controller;
use App\Model\Admin\Unitkerja;
use Illuminate\Http\Request;

class MasterUnitKerjaControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unitkerja::get();

        return view('pages.admin.masterdata.unitkerja',compact('unit'));
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
        $unit = new Unitkerja;
        $unit->nama_unit = $request->nama_unit;
        $unit->save();

        return redirect()->back()->with('messageberhasil','Data Unit Kerja Berhasil ditambahkan');
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_unit_kerja)
    {
        $unit = Unitkerja::find($id_unit_kerja);
        $unit->nama_unit = $request->nama_unit;
        $unit->update();

        return redirect()->back()->with('messageberhasil','Data Unit Kerja Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_unit_kerja)
    {
        $unit = Unitkerja::find($id_unit_kerja);
        $unit->delete();

        return redirect()->back()->with('messagehapus','Data Unit Kerja Berhasil dihapus');
    }
}
