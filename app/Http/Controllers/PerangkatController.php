<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerangkatDesa;
use App\Models\Position;

class PerangkatController extends Controller
{
    public function index()
    {
        $position = Position::all();
        $perangkat_desas = PerangkatDesa::all();
        return view('admin.perangkat_desa.data-perangkat', compact('perangkat_desas','position'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nip' => 'required',
            'name' => 'required',
            'jk' => 'required',
            'year' => 'required',
            'position_id' => 'required'
        ]);

        PerangkatDesa::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'jk' => $request->jk,
            'year' => $request->year,
            'position_id' => $request->position_id
        ]);
        return redirect()->back()->with(['message' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $position = Position::all();
        $perangkat_desas = PerangkatDesa::find($id);
        return view('admin.perangkat_desa.edit-perangkat', compact('perangkat_desas', 'position'));
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'nip' => 'required',
            'name' => 'required',
            'jk' => 'required',
            'year' => 'required',
            'position_id' => 'required',
        ]);

        $perangkat_desas = PerangkatDesa::find($id);
        $perangkat_desas->nip = $request->nip;
        $perangkat_desas->name = $request->name;
        $perangkat_desas->jk = $request->jk;
        $perangkat_desas->year = $request->year;
        $perangkat_desas->position_id = $request->position_id;
        $perangkat_desas->save();
        return redirect('/perangkat-desa')->with(['message' => 'Data Berhasil Diupdate!']);
    }

    public function delete($id)
    {
        $perangkat_desas = PerangkatDesa::find($id);
        $perangkat_desas->delete();
        return redirect('/perangkat-desa')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}
