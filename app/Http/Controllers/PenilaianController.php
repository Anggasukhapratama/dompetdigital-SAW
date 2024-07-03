<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function cari(Request $request)
    {
        // Define your alternatives
        $alternatifs = [
            [
                'nama' => 'OVO',
                'kode' => 'A1',
                'popularitas_aplikasi' => '>10 juta download',
                'kemudahan_fitur' => '< 4,7',
                'top_up_biaya_transaksi' => 'Murah',
                'keamanan_bertransaksi' => 'Sangat aman',
                'promosi_diskon' => '20%',
            ],
            [
                'nama' => 'Dana',
                'kode' => 'A2',
                'popularitas_aplikasi' => '=10 juta download',
                'kemudahan_fitur' => '= 4,7',
                'top_up_biaya_transaksi' => 'Sedang',
                'keamanan_bertransaksi' => 'Sangat aman',
                'promosi_diskon' => '10%',
            ],
            [
                'nama' => 'Gopay',
                'kode' => 'A3',
                'popularitas_aplikasi' => '=10 juta download',
                'kemudahan_fitur' => '= 4,7',
                'top_up_biaya_transaksi' => 'Murah',
                'keamanan_bertransaksi' => 'Sangat aman',
                'promosi_diskon' => '30%',
            ],
            [
                'nama' => 'Link aja',
                'kode' => 'A4',
                'popularitas_aplikasi' => '=10 juta download',
                'kemudahan_fitur' => '< 4,7',
                'top_up_biaya_transaksi' => 'Tinggi',
                'keamanan_bertransaksi' => 'Aman',
                'promosi_diskon' => '10%',
            ],
            [
                'nama' => 'Shopee pay',
                'kode' => 'A5',
                'popularitas_aplikasi' => '<10 juta download',
                'kemudahan_fitur' => '> 4,7',
                'top_up_biaya_transaksi' => 'Murah',
                'keamanan_bertransaksi' => 'Sangat aman',
                'promosi_diskon' => '20%',
            ],
        ];

        // Filter alternatives based on form input
        $filteredAlternatifs = array_filter($alternatifs, function ($alternatif) use ($request) {
            return $alternatif['popularitas_aplikasi'] == $request->input('kriteria1') &&
                   $alternatif['kemudahan_fitur'] == $request->input('kriteria2') &&
                   $alternatif['top_up_biaya_transaksi'] == $request->input('kriteria3') &&
                   $alternatif['keamanan_bertransaksi'] == $request->input('kriteria4') &&
                   $alternatif['promosi_diskon'] == $request->input('kriteria5');
        });

        return view('user.penilaian.index', compact('filteredAlternatifs'));
    }
}
