<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('admin.position.data-position', compact('positions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
        ]);

        Position::create([
            'name' => $request->name,
            'desc' => $request->desc,
        ]);
        return redirect()->back()->with(['message' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $positions = Position::find($id);
        return view('admin.position.edit-position', compact('positions'));
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
        ]);

        $positions = Position::find($id);
        $positions->name = $request->name;
        $positions->desc = $request->desc;
        $positions->save();
        return redirect('/position')->with(['message' => 'Data Berhasil Diupdate!']);
    }

    public function delete($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect('/position')->with(['message' => 'Data Berhasil Dihapus!']);
    }
}
