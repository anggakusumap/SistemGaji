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
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class DashboardPegawaiController extends Controller
{
    public function index()
    {
        // $user= User::first();
        $user = User::where('id', Auth::user()->id)->first();


        // $gaji = DetailGajipegawai::with('Gaji')->get();
        $gaji = DetailGajipegawai::with('gaji')->where('id', Auth::user()->id)->get();

        // $gajipegawai = Gajipegawai::with('DetailPegawai')->get();
        // return $gajipegawai;

        // return $gaji;
        // return $user;
        return view('pages.user.dashboard.index', [
            'user' => $user, 
            'gaji' => $gaji
        ]);
    }

    
    public function cetak($gaji)

    {
        // $data = DetailGajipegawai::with('Gaji')->where('id', '1')->whereHas('Gaji', function ($q) {
        //                 $q->where('bulan_gaji', '=', $q);
        //                 })->get();
        // $data = Gajipegawai::with('Detailgaji')->where('bulan_gaji', $gaji)->get();
// "28 Juni 2020"
        $months = array (1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'July',8=>'Augustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
        $user = User::where('id', Auth::user()->id)->first();
        // $data = Gajipegawai::with('Detailgaji')->where('bulan_gaji', $gaji)->whereHas('Detailgaji', function ($q) {
        //                 $q->where('id', '=', '2');
        //                 })->first();

        // $data = Gajipegawai::with('Detailgaji', function ($query) {
        //             $query->where('id', '=', '2');
        //         })->get();

        
        $data = Gajipegawai::with(array('Detailgaji' => function($query)
            {
                $query->where('id', '2');
            }))
                ->where('bulan_gaji', $gaji)->first();
       
        // $data = Gajipegawai::with('Detailpegawai')->where('bulan_gaji', $gaji)->whereHas('Detailpegawai', function ($query) {
        //             return $query->where('id', '=', 2);
        //         })->get();

        $bulan = $months[(int)substr($data->bulan_gaji, 5, 2)];

    //    return $data;
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        return view('pages.user.pdf', [
            'user' => $user, 
            'gaji' => $data,
            'bulan'=> $bulan,
            'tanggal' => $tanggal
        ]);
    }

    public function download($gaji)
    {
        $months = array (1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',7=>'July',8=>'Augustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember');
        $user = User::where('id', Auth::user()->id)->first();
        $data = Gajipegawai::with(array('Detailgaji' => function($query)
            {
                $query->where('id', Auth::user()->id);
            }))
                ->where('bulan_gaji', $gaji)->first();
        $bulan = $months[(int)substr($data->bulan_gaji, 5, 2)];

    //    return $data;
        $tanggal = Carbon::now()->isoFormat('D MMMM Y');
        return view('pages.user.download', [
            'user' => $user, 
            'gaji' => $data,
            'bulan'=> $bulan,
            'tanggal' => $tanggal
        ]);


        // // instantiate and use the dompdf class
        // $options = new Option();
        // $options->set('isRemoteEnabled', true);
        // $dompdf = new Dompdf($options);


        // $dompdf->loadHtml($download);

        // // (Optional) Setup the paper size and orientation
        // $dompdf->setPaper('A4');

        // // Render the HTML as PDF
        // $dompdf->render();

        // // Output the generated PDF to Browser
        // $dompdf->stream('Slip-gaji'."-".$gaji.".pdf");
    }
}
