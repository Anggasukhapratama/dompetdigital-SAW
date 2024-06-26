<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alternatif;

class AlternatifController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']); // Apply middleware to all methods in this controller
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        
        if ($search) {
            $alternatifs = Alternatif::where('kode', 'like', '%' . $search . '%')
                                     ->orWhere('nama', 'like', '%' . $search . '%')
                                     ->get();
        } else {
            $alternatifs = Alternatif::all();
        }
    
        return view('admin.adminalternatif.index', compact('alternatifs'));
    }
    
    

    public function create()
    {
        return view('admin.adminalternatif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|unique:alternatifs',
            'nama' => 'required|string',
        ]);

        Alternatif::create($request->all());

        return redirect()->route('admin.alternatif.index')
                         ->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        return view('admin.adminalternatif.edit', compact('alternatif'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|string|unique:alternatifs,kode,' . $id,
            'nama' => 'required|string',
        ]);
    
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->kode = $request->kode;
        $alternatif->nama = $request->nama;
        $alternatif->save();
    
        return redirect()->route('admin.alternatif.index')
                         ->with('success', 'Alternatif berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $alternatif->delete();

        return redirect()->route('admin.alternatif.index')
                         ->with('success', 'Alternatif berhasil dihapus.');
    }
    
}
