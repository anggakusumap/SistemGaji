<?php

namespace App\Http\Controllers\Admin\Penggajian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\Graderequest;
use App\Model\MasterGrade;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MasterGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = MasterGrade::get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.admin.masterdata.grade.index', compact('grade', 'today', 'tanggal'));
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
    public function store(Graderequest $request)
    {
        $grade = new MasterGrade;
        $grade->nama_grade = $request->nama_grade;
        $grade->save();

        return redirect()->back()->with('messageberhasil', 'Data Grade Gaji Berhasil ditambahkan');
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
        $grade = MasterGrade::find($id);
        $grade->nama_grade = $request->nama_grade;
        $grade->update();

        return redirect()->back()->with('messageberhasil','Data Grade Gaji Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = MasterGrade::find($id);
        $grade->delete();

        return redirect()->back()->with('messagehapus','Data Grade Gaji Berhasil dihapus');
    }
}
