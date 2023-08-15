<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;
use Storage;
use DB;
use Str;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::all();
        return view('admin.pengumuman.data-pengumuman', compact('pengumumans'));
    }

    public function post(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images','public');
        }

        $pengumuman = new Pengumuman();
        $pengumuman->title = $request->title;
        $pengumuman->desc = $request->desc;
        $pengumuman->image = $imagePath ?? null;
        $pengumuman->slug = \Str::slug($request->title);
        $pengumuman->save();

        return redirect('/pengumuman');
    }

    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('admin.pengumuman.edit-pengumuman', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file types and size as needed
        ]);

        $pengumuman = Pengumuman::find($id);
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($pengumuman->image) {
                Storage::disk('public')->delete($pengumuman->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $pengumuman->image = $imagePath;
        }

        $pengumuman->title = $request->title;
        $pengumuman->desc = $request->desc;
        $pengumuman->slug = \Str::slug($request->title);
        $pengumuman->save();

        return redirect('/pengumuman');
    }

    public function delete($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect('/pengumuman')->with(['message', 'Data Berhasil Dihapus']);
    }
}