<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']); // Apply middleware to all methods in this controller
    }

    public function index()
    {
        // Load kriteria with their subkriteria
        $kriteria = Kriteria::with('subkriteria')->get();
        
        return view('admin.adminsubkriteria.index', compact('kriteria'));
    
    }

    public function create()
    {
        $kriterias = Kriteria::all();
        
        return view('admin.adminsubkriteria.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nilai' => 'required|numeric',
            'kriteria_id' => 'required|exists:kriterias,id', // Ensure kriteria_id exists in the kriterias table
        ]);
    
        SubKriteria::create([
            'kriteria_id' => $request->kriteria_id,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
        ]);
    
        return redirect()->route('admin.subkriteria.index')
                         ->with('success', 'Subcriteria created successfully.');
    }
    

    public function edit($id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $kriterias = Kriteria::all();
        return view('admin.adminsubkriteria.edit', compact('subkriteria', 'kriterias'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'nilai' => 'required|numeric',
        'kriteria_id' => 'required|exists:kriterias,id', // Pastikan kriteria_id ada dalam tabel kriterias
    ]);

    $subkriteria = SubKriteria::findOrFail($id);
    $subkriteria->nama = $request->nama;
    $subkriteria->nilai = $request->nilai;
    $subkriteria->kriteria_id = $request->kriteria_id;
    $subkriteria->save();

    return redirect()->route('admin.subkriteria.index')->with('success', 'Subcriteria updated successfully.');
}



    public function destroy($id)
    {
        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->delete();

        return redirect()->route('admin.subkriteria.index')->with('success', 'Sub Kriteria berhasil dihapus.');
    }
}
