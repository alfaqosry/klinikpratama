<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view('auth.login');
    }

    public function post(Request $request)
    {
        $cre = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($cre)) {
            $request->session()->regenerate();

            $checkRole = Auth::user()->role;
            // dd($checkRole);
            if ($checkRole == 'Admin') {
                return redirect()->route('home');
            } elseif ($checkRole == 'Petugas') {
                return redirect()->route('dashboard');
            } elseif ($checkRole == 'Penjual') {
                return redirect()->route('home.index');
            }
        }


        return back()->with('gagal', 'Login failed!');
    }


    public function index()
    {
        return view('auth.login');
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'name' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
            'pekerjaan' => 'required',
            'jkelamin' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',

        ]);

        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'pekerjaan' => $request->pekerjaan,
            'jkelamin' => $request->pekerjaan,
            'tgl_lahir' => $request->tgl_lahir,
            'password' => Hash::make($request->input('password')),
            'role' => "Admin",
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('login')->with('sukses', 'Registrasi Anda Berhasi!, Silahkan Login...');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
