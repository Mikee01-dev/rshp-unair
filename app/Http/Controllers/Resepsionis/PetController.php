<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Pet;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('pemilik')->get();
        return view('resepsionis.pet.index', compact('pets'));
    }
}
