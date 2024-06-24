<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Alternatif;
use App\Models\NilaiKriteria;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        if ($search) {
            $kriterias = Kriteria::where('kode', 'like', '%' . $search . '%')
                                 ->orWhere('nama', 'like', '%' . $search . '%')
                                 ->get();
        } else {
            $kriterias = Kriteria::all();
        }
    
        return view('admin.adminkriteria.index', compact('kriterias'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'bobot' => 'required|integer|min:0|max:100',
            'jenis' => ['required', Rule::in(['benefit', 'cost'])],
        ]);
    
        $totalBobot = Kriteria::sum('bobot');
        $newBobot = $request->bobot;
        if ($totalBobot + $newBobot > 100) {
            return redirect()->back()->with('error', 'Total bobot tidak boleh melebihi 100.');
        }
    
        Kriteria::create($request->all());
    
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'bobot' => 'required|integer|min:0|max:100',
            'jenis' => ['required', Rule::in(['benefit', 'cost'])],
        ]);
    
        $totalBobot = Kriteria::where('id', '!=', $id)->sum('bobot');
        $newBobot = $request->bobot;
        if ($totalBobot + $newBobot > 100) {
            return redirect()->back()->with('error', 'Total bobot tidak boleh melebihi 100.');
        }
    
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($request->all());
    
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }
    
    public function create()
    {
        return view('admin.adminkriteria.create');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->delete();

        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        return view('admin.adminkriteria.edit', compact('kriteria'));
    }

    public function normalisasi()
{
    $kriterias = Kriteria::all();
    $alternatifs = Alternatif::all();
    $nilaiKriterias = NilaiKriteria::all();

    // Step 1: Normalisasi
    $normalisasi = [];
    foreach ($kriterias as $kriteria) {
        $maxValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->max('nilai');
        $minValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->min('nilai');
        
        // Ensure maxValue and minValue are not zero
        if ($maxValue == 0) {
            $maxValue = 1; // Assign a non-zero value to avoid division by zero
        }
        if ($minValue == 0) {
            $minValue = 1; // Assign a non-zero value to avoid division by zero
        }

        foreach ($alternatifs as $alternatif) {
            $nilai = NilaiKriteria::where('alternatif_id', $alternatif->id)
                                    ->where('kriteria_id', $kriteria->id)
                                    ->first();
            if ($nilai) {
                $normalisasi[$alternatif->id][$kriteria->id] = ($kriteria->jenis == 'benefit') ?
                    $nilai->nilai / $maxValue :
                    $minValue / $nilai->nilai;
            } else {
                $normalisasi[$alternatif->id][$kriteria->id] = 0;
            }
        }
    }

    // Step 2: Menghitung skor SAW
    $hasilSaw = [];
    foreach ($alternatifs as $alternatif) {
        $hasilSaw[$alternatif->id] = 0;
        foreach ($kriterias as $kriteria) {
            $hasilSaw[$alternatif->id] += $normalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
        }
    }

    return view('admin.adminkriteria.normalisasi', compact('kriterias', 'alternatifs', 'nilaiKriterias', 'normalisasi', 'hasilSaw'));
}

    

    public function storeNormalisasi(Request $request)
{
    $data = $request->input('nilai');

    // Validate that none of the nilai values are null
    foreach ($data as $alternatifId => $nilaiKriterias) {
        foreach ($nilaiKriterias as $kriteriaId => $nilai) {
            if (is_null($nilai)) {
                return redirect()->route('admin.normalisasi')->with('error', 'Nilai tidak boleh kosong.');
            }
        }
    }

    foreach ($data as $alternatifId => $nilaiKriterias) {
        foreach ($nilaiKriterias as $kriteriaId => $nilai) {
            NilaiKriteria::updateOrCreate(
                [
                    'alternatif_id' => $alternatifId,
                    'kriteria_id' => $kriteriaId,
                ],
                [
                    'nilai' => $nilai
                ]
            );
        }
    }

    return redirect()->route('admin.normalisasi')->with('success', 'Nilai berhasil disimpan dan dinormalisasi.');
}


public function penilaian()
{
    $kriterias = Kriteria::all();
    $alternatifs = Alternatif::all();
    $nilaiKriterias = NilaiKriteria::all();

    // Step 1: Normalisasi
    $normalisasi = [];
    foreach ($kriterias as $kriteria) {
        $maxValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->max('nilai');
        $minValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->min('nilai');
        
        // Ensure maxValue and minValue are not zero
        if ($maxValue == 0) {
            $maxValue = 1; // Assign a non-zero value to avoid division by zero
        }
        if ($minValue == 0) {
            $minValue = 1; // Assign a non-zero value to avoid division by zero
        }

        foreach ($alternatifs as $alternatif) {
            $nilai = NilaiKriteria::where('alternatif_id', $alternatif->id)
                                    ->where('kriteria_id', $kriteria->id)
                                    ->first();
            if ($nilai) {
                $normalisasi[$alternatif->id][$kriteria->id] = ($kriteria->jenis == 'benefit') ?
                    $nilai->nilai / $maxValue :
                    $minValue / $nilai->nilai;
            } else {
                $normalisasi[$alternatif->id][$kriteria->id] = 0;
            }
        }
    }

    // Step 2: Menghitung skor SAW
    $hasilSaw = [];
    foreach ($alternatifs as $alternatif) {
        $hasilSaw[$alternatif->id] = 0;
        foreach ($kriterias as $kriteria) {
            $hasilSaw[$alternatif->id] += $normalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
        }
    }

    return view('admin.adminpenilaian.index', compact('kriterias', 'alternatifs', 'nilaiKriterias', 'normalisasi', 'hasilSaw'));
}

    public function perangkingan()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $nilaiKriterias = NilaiKriteria::all();
    
        // Step 1: Normalisasi
        $normalisasi = [];
        foreach ($kriterias as $kriteria) {
            $maxValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->max('nilai');
            $minValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->min('nilai');
            
            // Ensure maxValue and minValue are not zero
            if ($maxValue == 0) {
                $maxValue = 1; // Assign a non-zero value to avoid division by zero
            }
            if ($minValue == 0) {
                $minValue = 1; // Assign a non-zero value to avoid division by zero
            }
    
            foreach ($alternatifs as $alternatif) {
                $nilai = NilaiKriteria::where('alternatif_id', $alternatif->id)
                                        ->where('kriteria_id', $kriteria->id)
                                        ->first();
                if ($nilai) {
                    $normalisasi[$alternatif->id][$kriteria->id] = ($kriteria->jenis == 'benefit') ?
                        $nilai->nilai / $maxValue :
                        $nilai->nilai / $minValue;
                } else {
                    $normalisasi[$alternatif->id][$kriteria->id] = 0;
                }
            }
        }
    
        // Step 2: Menghitung skor SAW
        $hasilSaw = [];
        foreach ($alternatifs as $alternatif) {
            $hasilSaw[$alternatif->id] = 0;
            foreach ($kriterias as $kriteria) {
                $hasilSaw[$alternatif->id] += $normalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
            }
        }
        // Urutkan hasil SAW dari yang tertinggi ke terendah
        arsort($hasilSaw);
    
        // Format hasil perangkingan untuk ditampilkan di view
        $sortedAlternatifs = [];
        foreach ($hasilSaw as $alternatifId => $nilaiSaw) {
            $alternatif = Alternatif::find($alternatifId);
            if ($alternatif) {
                $sortedAlternatifs[] = [
                    'alternatif' => $alternatif,
                    'nilai_saw' => $nilaiSaw,
                ];
            }
        }
    
        return view('admin.adminperangkingan.index', compact('sortedAlternatifs'));
    }
    
    public function PenilaianSAW()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::all();
        $nilaiKriterias = NilaiKriteria::all();
    
        // Step 1: Normalisasi
        $normalisasi = [];
        foreach ($kriterias as $kriteria) {
            $maxValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->max('nilai');
            $minValue = NilaiKriteria::where('kriteria_id', $kriteria->id)->min('nilai');
            
            // Ensure maxValue and minValue are not zero
            if ($maxValue == 0) {
                $maxValue = 1; // Assign a non-zero value to avoid division by zero
            }
            if ($minValue == 0) {
                $minValue = 1; // Assign a non-zero value to avoid division by zero
            }
    
            foreach ($alternatifs as $alternatif) {
                $nilai = NilaiKriteria::where('alternatif_id', $alternatif->id)
                                        ->where('kriteria_id', $kriteria->id)
                                        ->first();
                if ($nilai) {
                    $normalisasi[$alternatif->id][$kriteria->id] = ($kriteria->jenis == 'benefit') ?
                        $nilai->nilai / $maxValue :
                        $nilai->nilai / $minValue;
                } else {
                    $normalisasi[$alternatif->id][$kriteria->id] = 0;
                }
            }
        }
    
        // Step 2: Menghitung skor SAW
        $hasilSaw = [];
        foreach ($alternatifs as $alternatif) {
            $hasilSaw[$alternatif->id] = 0;
            foreach ($kriterias as $kriteria) {
                $hasilSaw[$alternatif->id] += $normalisasi[$alternatif->id][$kriteria->id] * $kriteria->bobot;
            }
        }
        // Urutkan hasil SAW dari yang tertinggi ke terendah
        arsort($hasilSaw);
    
        // Format hasil perangkingan untuk ditampilkan di view
        $sortedAlternatifs = [];
        foreach ($hasilSaw as $alternatifId => $nilaiSaw) {
            $alternatif = Alternatif::find($alternatifId);
            if ($alternatif) {
                $sortedAlternatifs[] = [
                    'alternatif' => $alternatif,
                    'nilai_saw' => $nilaiSaw,
                ];
            }
        }
    
        return view('user.penilaian.index', compact('sortedAlternatifs'));
    }
}

