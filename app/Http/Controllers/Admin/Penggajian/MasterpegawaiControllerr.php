<?php

namespace App\Http\Controllers\Admin\Penggajian;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\Pegawairequest;
use App\Model\Admin\Pegawai;
use App\Model\MasterGrade;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterpegawaiControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::get();
        $jumlah = User::count();
     
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('pages.admin.masterdata.pegawai.pegawai', compact('pegawai', 'jumlah', 'today', 'tanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = User::get();
        $grade = MasterGrade::get();

        return view('pages.admin.masterdata.pegawai.create', compact('pegawai','grade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Pegawairequest $request)
    {
        $user = new User;
        $user->nama_pegawai = $request->nama_pegawai;
        $user->nip_pegawai = $request->nip_pegawai;
        $user->pangkat = $request->pangkat;
        $user->golongan = $request->golongan;
        $user->id_grade = $request->id_grade;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('master-pegawai.index')->with('messageberhasil', 'Data Pegawai Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('pages.admin.masterdata.pegawai.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $grade = MasterGrade::get();

        return view('pages.admin.masterdata.pegawai.edit', compact('user','grade'));
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
        $user = User::find($id);
        $user->nama_pegawai = $request->nama_pegawai;
        $user->nip_pegawai = $request->nip_pegawai;
        $user->pangkat = $request->pangkat;
        $user->golongan = $request->golongan;
        $user->id_grade = $request->id_grade;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('master-pegawai.index')->with('messageberhasil', 'Data Pegawai Berhasil diUbah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('messagehapus', 'Data Pegawai Berhasil Terhapus');
    }
}
