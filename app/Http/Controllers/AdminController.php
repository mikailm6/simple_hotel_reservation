<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::get();

        return view('amogus.m_admins', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $admins = User::where('id', $id)->first();

        return view('amogus.e_admins', compact('admins'));
    }
    
    public function update(Request $request, $id)
    {
        $admins = User::where('id', $id)->first();

        $request->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        $admins->update([
            'name' => $request['name'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin Berhasil Di Update');
    }

    public function delete($id)
    {
        $admins = User::where('id', $id)->first();
        $admins->delete();

        return redirect()->route('admins.index')->with('success', 'Admin Berhasil Di Hapus');
    }
}
