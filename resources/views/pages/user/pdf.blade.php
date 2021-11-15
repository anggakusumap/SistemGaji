<!DOCTYPE html>
<html>

<head>
    <style media="print">
        @page {
            size: auto;
            margin: 0;
        }

    </style>
    {{-- <title>contoh surat pengunguman</title> --}}
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }

        font {
            line-height: 1em;
        }

    </style>
</head>

<body>
    <center>
        <table width="625" style="margin-top: 40px;">
            <tr>
                <td><img src="{{ asset("logosurat.PNG") }}" width="105" height="105"></td>
                <td>
                    <center>
                        <font size="4">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</font><br>
                        <font size="4">DIREKTORAT JENDERAL PAJAK</font><br>
                        <font size="4">KANTOR WILAYAH DJP BALI</font><br>
                        <font size="4">KANTOR PELAYANAN PAJAK PRATAMA GIANYAR</font><br>

                        <div>
                            <p style="font-size:10px; line-height:10px;margin-bottom: 2px;margin-top: 9px;">
                                JALAN DHARMA GIRI, BURUAN, BLAHBATUH, GIANYAR
                            </p>
                            <p style="font-size:10px; line-height:10px;margin-bottom: 2px;margin-top: 0px;">
                                TELEPON (0361) 943586; FAKSIMILE (0361) 948002 SITUS
                                <u>www.pajak.go.id</u>;
                            </p>
                            <p style="font-size:10px; line-height:10px;margin-bottom: 2px;margin-top: 0px;">
                                LAYANAN INFORMASI DAN PENGADUAN KRING PAJAK (021)
                                1500200
                            </p>
                            <p style="font-size:10px; line-height:10px;margin-bottom: 0px;margin-top: 0px;">
                                EMAIL <u>pengaduan@pajak.go.id</u>,
                                <u>informasi@pajak.go.id</u>
                            </p>
                        </div>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>

            </tr>
        </table>

        <table>
            <tr>
                <td>
                    <center>
                        <font size="3"><b>SURAT KETERANGAN PENGHASILAN</b></font><br>
                        </div>
                    </center>
                </td>
            </tr>
        </table>

        <br>
        <table width="625">
            <tr>
                <td>
                    <font size="2">Bendahara Kantor Pelayanan Pajak Pratama Gianyar Menerangkan Bahwa :</font>
                </td>
            </tr>
        </table>
        <br>

        <table style="border-left-width: 20px;">
            <tr class="text2">
                <td width="150">Nama</td>
                <td width="400">: {{ $user->nama_pegawai }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>: {{ $user->nip_pegawai }}</td>
            </tr>
            <tr>
                <td>Pangkat/Golongan</td>
                <td>: {{ $user->golongan }}</td>
            </tr>
        </table>
        <br>

        <table width="625">
            <tr>
                <td>
                    <font size="2">Mempunyai Penghasilan bulan {{ $bulan }}
                        {{ substr($gaji->bulan_gaji, 0, 4) }} dengan perincian sebagai
                        berikut :</font>
                </td>
            </tr>
        </table>
        <br>

        <table style="border-right-width: 180px; border-bottom-width: 0px;">
            <tr class="text2">
                <td width="220">Gaji Pokok</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->gaji_pokok == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->gaji_pokok,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Isteri / Suami</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_istrisuami == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_istrisuami,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Anak</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_anak == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_anak,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Jabatan Struktural</td>
                <td width="5"> Rp.
                </td>
               <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_jabatan_struktural == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_jabatan_struktural,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Jabatan Fungsional</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_jabatan_fungsional == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_jabatan_fungsional,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Umum</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_umum == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_umum,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan Beras</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_beras == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_beras,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Tunjangan PPh</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_pph == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_pph,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Pembulatan</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->pembulatan == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->pembulatan,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <hr style="margin-top: 0px; margin-bottom: 0px;">
                </td>

            </tr>
        </table>
        <table style="border-left-width: 130px; border-top-width: 0px;">
            <tr class="text2">
                <td width="250">Jumlah Kotor :</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->jumlah_kotor == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->jumlah_kotor,0,',','.') }},-
                    @endif
                </td>
        </table>

        <table style="border-right-width: 180px; border-bottom-width: 0px;">
            <tr class="text2">
                <td><b>Potongan-potongan :</b></td>
            </tr>
            <tr class="text2">
                <td width="220">Iuran Wajib</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->iuran_wajib == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->iuran_wajib,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">BPJS</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->bpjs == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->bpjs,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">Sewa Rumah</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->sewa_rumah == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->sewa_rumah,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr class="text2">
                <td width="220">PPh Pasal 21</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->pph_pasal_21 == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->pph_pasal_21,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <hr style="margin-top: 0px; margin-bottom: 0px;">
                </td>

            </tr>
        </table>
        <table style="border-left-width: 120px; border-top-width: 0px;">
            <tr class="text2">
                <td width="270">Jumlah Potongan :</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->jumlah_potongan == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->jumlah_potongan,0,',','.') }},-
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <hr style="margin-top: 0px; margin-bottom: 0px;">
                </td>

            </tr>
        </table>

        @if ( $gaji->Detailgaji->first()->tunjangan_kinerja == 0 && $gaji->Detailgaji->first()->jumlah_potongan_lainnya==0)
        <table style="border-right-width: 10px; border-top-width: 0px;">
            <tr class="text2">
                <td width="390">Jumlah Bersih Gaji :</td>
                <td width="5"> <b>Rp.</b>
                </td>
                <td width="130" style="text-align: right"><b>
                    @if ($gaji->Detailgaji->first()->jumlah_bersih_gaji == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->jumlah_bersih_gaji,0,',','.') }},-
                    @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <hr style="margin-top: 0px; margin-bottom: 0px; height:1px; color:#333;background-color:#333;">
                </td>

            </tr>
        </table>
        @else
        <table style="border-right-width: 10px; border-top-width: 0px;">
            <tr class="text2">
                <td width="390"><b>Jumlah Bersih :</b></td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->jumlah_bersih_gaji == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->jumlah_bersih_gaji,0,',','.') }},-
                    @endif
                </td>
            </tr>

            <tr class="text2">
                <td width="220">Penerimaan Tunjangan Kinerja</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->tunjangan_kinerja == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->tunjangan_kinerja,0,',','.') }},-
                    @endif
                </td>
            </tr>

            <tr class="text2">
                <td width="220">Penerimaan Lain-lain</td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right">
                    @if ($gaji->Detailgaji->first()->jumlah_potongan_lainnya == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->jumlah_potongan_lainnya,0,',','.') }},-
                    @endif
                </td>
            </tr>

            <tr class="text2">
                <td width="390"><b>Jumlah Penerimaan Total :</b></td>
                <td width="5"> Rp.
                </td>
                <td width="130" style="text-align: right"><b>
                    @if ($gaji->Detailgaji->first()->penerimaan_total == 0)
                        ,-
                    @else
                        {{ number_format($gaji->Detailgaji->first()->penerimaan_total,0,',','.') }},-
                    @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <hr style="margin-top: 0px; margin-bottom: 0px; height:1px; color:#333;background-color:#333;">
                </td>

            </tr>
        </table>

        @endif




        <br>
        <br>
        <br>
        <table width="625">
            <tr>
                <td width="420"><br><br><br><br></td>
                <td class="text" style="text-align: left">Gianyar, {{ $tanggal }}<br>Bendahara
                    Pengeluaran<br><br><br><br>Rikko Juniardo<br>NIP 19910610 201411 1 002</td>
            </tr>
        </table>
    </center>
</body>
<script type="text/javascript">
    <!--
    window.print();
    //

    -->
</script>

</html>
