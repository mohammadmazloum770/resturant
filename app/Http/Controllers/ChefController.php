<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function create()
    {
        return view('admin.chefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:chefs,email',
            'password' => 'required|string|min:6',
        ]);

        Chef::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.chefs.create')->with('success', 'Chef added successfully!');
    }

   
}
