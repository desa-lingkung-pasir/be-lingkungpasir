<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view ('admin.profile.data-profile', compact('profiles'));
    }

    public function create()
    {
        return view ('admin.profile.create-profile');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'visi' => 'required',
            'misi' => 'required',
        ]);

        Profile::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);
        return redirect('/profile')->with(['message' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $profiles = Profile::find($id);
        return view('admin.profile.edit-profile', compact('profiles'));
    }

    public function update (Request $request, $id)
    {

        $this->validate($request, [
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $profiles = Profile::find($id);
        $profiles->visi = $request->visi;
        $profiles->misi = $request->misi;
        $profiles->save();
        return redirect('/profile')->with(['message' => 'Data Berhasil Diupdate!']);
    }

    public function delete($id)
    {
        $profiles = Profile::find($id);
        $profiles->delete();
        return redirect()->back()->with(['message' => 'Data Berhasil Dihapus!']);
    }
}