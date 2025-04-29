<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaiterController extends Controller
{
    public function loginForm()
    {
        return view('waiter.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('waiter')->attempt($request->only('email', 'password'))) {
            return redirect('/waiter/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function dashboard()
    {
        return view('waiter.dashboard');
    }
}
