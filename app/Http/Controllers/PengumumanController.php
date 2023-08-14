<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;
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
        $this->validate($request, [
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'required',
        ]);

        $file = $request->file('image');
 
		$nama_file = time()."_".$file->getClientOriginalExtension();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'images/';
		$file->move($tujuan_upload,$nama_file);
 
		Pengumuman::create([
            'title' => $request->title,
            'desc' => $request->desc,
			'image' => $nama_file,
            'slug' => Str::slug($request->title)
		]);
 
		return redirect('/pengumuman')->with('message', 'Data Berhasil Disimpan');
    }
}
