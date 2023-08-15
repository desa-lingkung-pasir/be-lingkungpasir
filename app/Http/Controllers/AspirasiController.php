<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::paginate(5);
        return view('admin.aspirasi.data-aspirasi', compact('aspirasi'));
    }
}
