<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RasHewan;

class RasHewanController extends Controller
{
    public function index()
    {
        $rasHewan = RasHewan::with('jenis')->get();
        return view('admin.ras-hewan.index', compact('rasHewan'));
    }
}
