<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Model\DetailGajipegawai;
use App\Model\Gajipegawai;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Dompdf\Dompdf;

class DashboardPegawaiController extends Controller
{
    public function index()
    {
        $user= User::first();
        // $user = User::firstOrFail(Auth::user()->id);


        $gaji = DetailGajipegawai::with('Gaji')->get();
        // $gaji = DetailGajipegawai::with('gaji')->where('id', Auth::user()->id)->get();

        // $gajipegawai = Gajipegawai::with('DetailPegawai')->get();
        // return $gajipegawai;

        // return $gaji;
        // return $user;
        return view('pages.user.dashboard.index', [
            'user' => $user, 
            'gaji' => $gaji
        ]);
    }
    public function cetak($id)
    {
        $download =view('pages.user.pdf');

        // instantiate and use the dompdf class
        $dompdf = new Dompdf;
        $dompdf->loadHtml($download);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('Slip-gaji'."-".$id.".pdf");
    }
}
