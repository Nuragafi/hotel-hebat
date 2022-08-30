<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\users;

class loginController extends Controller
{
    public function login(Request $request)
    {

        $input = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($input)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/kamar');
            } elseif (Auth::user()->role == 'resepsionis') {
                return redirect('resepsionis/dashboard');
            }
        }
        return redirect()->back()->with('error', 'Username or Password Are Wrong.');
    }

    public function FormLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/kamar');
            } elseif (Auth::user()->role == 'resepsionis') {
                return redirect('resepsionis/dashboard');
            }
        }
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        $users = Users::where('role', 'resepsionis')->get();
        return view('admin.users.dashboard', compact('users'));
    }

    public function register()
    {
        return view('admin.users.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        users::create([
            'username' => $request->username,
            'password' => $request->password = Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('admin/users');
    }

    public function edit($id)
    {
        $users = users::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        users::where('id', $id)->update([
            'username' => $request->username,
            'password' => $request->password = Hash::make($request->password),
        ]);

        return redirect('admin/users');
    }

    public function destroy($id)
    {
        users::destroy($id);
        return redirect('admin/users');
    }
}
