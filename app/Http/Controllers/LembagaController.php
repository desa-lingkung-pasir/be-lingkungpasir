<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lembaga;

class LembagaController extends Controller
{
    public function index()
    {
        $kelembagaans = Lembaga::all();
        return view('admin.kelembagaan.data-kelembagaan', compact('kelembagaans'));
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $kelembagaan = new Lembaga;
        $kelembagaan->nama = $request->nama;
        $kelembagaan->alamat = $request->alamat;
        $kelembagaan->save();

        return redirect('/kelembagaan')->with(['message', 'Berhasil Disimpan']);
    }

    public function edit ($id)
    {
        $kelembagaan = Lembaga::find($id);
        return view('admin.kelembagaan.edit-kelembagaan', compact('kelembagaan'));
    }

    public function update(Request $request, $id)
    {
        $kelembagaan = Lembaga::find($id);
        $kelembagaan->nama = $request->nama;
        $kelembagaan->alamat = $request->alamat;
        $kelembagaan->save();

        return redirect('/kelembagaan')->with(['message', 'Data Berhasil Diupdate']);
    }

    public function delete($id)
    {
        $kelembagaan = Lembaga::find($id);
        $kelembagaan->delete();

        return redirect('/kelembagaan')->with(['message', 'Data Berhasil Dihapus']);
    }
}