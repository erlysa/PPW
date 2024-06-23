<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kucing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KucingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if ($keyword) {
            $kucings = Kucing::where('nama_kucing', 'LIKE', "%$keyword%")->get();
        } else {
            $kucings = Kucing::all();
        }
    
        return view('kucing.index', compact('kucings'));
    }


    public function create()
    {
        return view('kucing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kucing' => 'required|numeric',
            'nama_kucing' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'ras_kucing' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'status_kesehatan' => 'required|string',
            'foto_kucing' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_kucing')) {
            $fotoKucing = $request->file('foto_kucing')->store('public/images');
            $validated['foto_kucing'] = basename($fotoKucing);
        }

        Kucing::create($validated);

        return redirect()->route('kucing.index')->with('success', 'Kucing berhasil ditambahkan');
    }

    public function edit(Kucing $kucing)
    {
        return view('kucing.edit', compact('kucing'));
    }

    public function update(Request $request, Kucing $kucing)
    {
        $validated = $request->validate([
            'id_kucing' => 'required|numeric',
            'nama_kucing' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'ras_kucing' => 'required|string|max:255',
            'berat_badan' => 'required|numeric',
            'status_kesehatan' => 'required|string',
            'foto_kucing' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto_kucing')) {
            $fotoKucing = $request->file('foto_kucing')->store('public/images');
            $validated['foto_kucing'] = basename($fotoKucing);
            if ($kucing->foto_kucing) {
                Storage::delete('public/images/' . $kucing->foto_kucing);
            }
        }

        $kucing->update($validated);

        return redirect()->route('kucing.index')->with('success', 'Kucing berhasil diupdate');
    }

    public function destroy(Kucing $kucing)
    {
        if ($kucing->foto_kucing) {
            Storage::delete('public/images/' . $kucing->foto_kucing);
        }
        $kucing->delete();
        return redirect()->route('kucing.index')->with('success', 'Kucing berhasil dihapus');
    }
}
