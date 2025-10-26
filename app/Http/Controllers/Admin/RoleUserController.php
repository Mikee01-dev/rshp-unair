<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\RoleUser;
class RoleUserController extends Controller
{
    public function index()
    {
        $roleUser = RoleUser::with('user', 'role')->get();
        return view('admin.user-role.index', compact('roleUser'));
    }
}
