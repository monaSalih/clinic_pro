<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

   protected function redirectTo()
{
    if (auth()->user()->role === 'admin') {
        return '/admin/dashboard'; // or route('admin.dashboard')
    } elseif (auth()->user()->role === 'patient') {
        return route('patient.home'); // named route for patient
    } elseif (auth()->user()->role === 'doctor') {
        return route('doctor.home'); // named route for doctor
    }

    return '/home'; // fallback
}


    // Redirect after logout
    protected function loggedOut($request)
    {
        return redirect()->route('login');
    }
}
