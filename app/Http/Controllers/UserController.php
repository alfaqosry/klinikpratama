<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "User";
        $user = User::all();
        return view('user.index', compact('user', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "User";
        return view('user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'nama' => 'required',
            'no_tlpn' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'role' => 'required'
        ]);

        $user = $request->all();
        $user['foto'] = $request->file('foto')->store('foto', 'public');
        User::create($user);
        return redirect()->route('user')->with('sukses', 'User berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $title = "user";

        $user = User::where('username', $username)->first();


        return view('user.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'User';
        $user = User::find($id);
        return view('user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $changePassword = $request->password;
        if ($changePassword == null) {

            $user = User::find($id);
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->no_tlpn = $request->no_tlpn;
            $user->role = $request->role;
            $user->email = $request->email;


            $user->save();

            return redirect()->route('user', compact('user'))->with('sukses', 'User Berhasil di-Update');
        } else {

            $user = User::find($id);
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->no_tlpn = $request->no_tlpn;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            return redirect()->route('user', compact('user'))->with('sukses', 'User Berhasil di-Update');
        }
    }


    public function profile(string $username)
    {


        $user = User::where('username', $username)->first();


        return view('user.profile', compact('user',));
    }
    public function profileupdate(Request $request, string $id)
    {


        $user = User::find($id);
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->pekerjaan = $request->pekerjaan;
        if ($request->foto) {
            $user['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $user->save();



        return back()->with('sukses', 'Profile anda berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::find($id);
        $user->delete();
        return Redirect()->route('user')->with('sukses', 'User Berhasil di-Delete');
    }
}
