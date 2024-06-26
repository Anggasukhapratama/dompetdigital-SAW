<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    private $alternatifs = [
        [
            'nama' => 'Dana',
            'kode' => 'A1',
            'popularitas_aplikasi' => 10,
            'kemudahan_fitur' => 4.7,
            'top_up_biaya_transaksi' => 45,
            'keamanan_bertransaksi' => 3,
            'promosi_diskon' => 10,
        ],
        [
            'nama' => 'OVO',
            'kode' => 'A2',
            'popularitas_aplikasi' => 50,
            'kemudahan_fitur' => 4.0,
            'top_up_biaya_transaksi' => 25,
            'keamanan_bertransaksi' => 3,
            'promosi_diskon' => 20,
        ],
        [
            'nama' => 'Gopay',
            'kode' => 'A3',
            'popularitas_aplikasi' => 10,
            'kemudahan_fitur' => 4.7,
            'top_up_biaya_transaksi' => 25,
            'keamanan_bertransaksi' => 3,
            'promosi_diskon' => 30,
        ],
        [
            'nama' => 'Link aja',
            'kode' => 'A4',
            'popularitas_aplikasi' => 10,
            'kemudahan_fitur' => 3.6,
            'top_up_biaya_transaksi' => 65,
            'keamanan_bertransaksi' => 2,
            'promosi_diskon' => 10,
        ],
        [
            'nama' => 'Shopeepay',
            'kode' => 'A5',
            'popularitas_aplikasi' => 1,
            'kemudahan_fitur' => 4.8,
            'top_up_biaya_transaksi' => 25,
            'keamanan_bertransaksi' => 3,
            'promosi_diskon' => 20,
        ],
    ];

    public function index()
    {
        return view('user.penilaian.index');
    }

    public function cari(Request $request)
    {
        $kriteria = $request->input('kriteria');
        $nilai = $request->input('nilai');

        $filteredAlternatifs = array_filter($this->alternatifs, function($alternatif) use ($kriteria, $nilai) {
            switch ($kriteria) {
                case 'C1':
                    return $alternatif['popularitas_aplikasi'] == $nilai;
                case 'C2':
                    return $alternatif['kemudahan_fitur'] == $nilai;
                case 'C3':
                    return $alternatif['top_up_biaya_transaksi'] == $nilai;
                case 'C4':
                    return $alternatif['keamanan_bertransaksi'] == $nilai;
                case 'C5':
                    return $alternatif['promosi_diskon'] == $nilai;
                default:
                    return false;
            }
        });

        return view('user.penilaian.index', compact('filteredAlternatifs'));
    }
}
