<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(request $request)
    {
        $validator =  Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::with(['roleUser'=>function($query){
            $query->where('status',1);
        },'roleUser.role'])
        ->where('email', $request->input('email'))
        ->first();
        
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'These credentials do not match our records.'])
                ->withInput();
        }

        if (!\Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password' => 'The provided password is incorrect.'])
                ->withInput();
        }

        Auth::login($user);

        $request->session()->put([
            'user_id' => $user->iduser,
            'user_name' => $user->nama,
            'user_email' => $user->email,
            'role_id' => $user->roleUser[0]->idrole ?? 'user',
            'role_name' => $user->roleUser[0]->role->nama_role ?? 'User',
            'user_status' => $user->roleUser[0]->status ??'active'
        ]);

        $userRole = $user->roleUser[0]->idrole ?? null;

        switch ($userRole) {
            case 1:
                return redirect()->route('admin.dashboard')->with('success', 'Login successful.');
            case 2:
                return redirect()->route('dokter.dashboard')->with('success', 'Login successful.');
            case 3:
                return redirect()->route('perawat.dashboard')->with('success', 'Login successful.');
            case 4:
                return redirect()->route('resepsionis.dashboard')->with('success', 'Login successful.');
            case 5:
                return redirect()->route('pemilik.dashboard')->with('success', 'Login successful.');
            default:
                return redirect('/home')->with('success', 'Login successful.');
        }
    }

    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
