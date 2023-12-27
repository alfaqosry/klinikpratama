<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\Treatment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $layanan = Layanan::all();
        return view('home.index', compact('layanan'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function treatment($id)
    {

        $treatment = Treatment::where('layanan_id', $id)->get();
        $layanan = Layanan::findorfail($id);
        return view('home.treatment', compact('treatment', 'layanan'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'treatment_id' => 'required',
            'harga_pesanan' => 'required',


        ]);

        foreach ($request->treatment_id as $item) {
            $harga = Treatment::where('id', $item)->first();
            $pesan = Pesanan::create([
                'treatment_id' => $item,
                'pelanggan_id' => auth()->user()->id,
                'harga_pesanan' => $harga->harga,
                'status' => "Diproses"


            ]);
        }


        return redirect()->route('home')->with('sukses', 'Treatment berhasil di pesan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show($home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit($home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy($home)
    {
        //
    }
}
