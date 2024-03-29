<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\User;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pesanan::join('users', 'pesanans.pelanggan_id', 'users.id')->distinct()->get(['pelanggan_id', 'name', 'alamat']);



        return view('pesanan.index', compact('pelanggan'));
    }

    public function terimapesanan($id){
        $pesanan = Pesanan::findorFail($id);
        Pesanan::where('id',$id)->update(array(
            'status'=>"Pesanan Diterima",
));

return redirect()->route('pesanan.show', $pesanan->pelanggan_id)->with('sukses', "Pesanan berhasil di terima");

    }



    public function selesaipesanan($id){
        $pesanan = Pesanan::findorFail($id);
        Pesanan::where('id',$id)->update(array(
            'status'=>"Pesanan Selesai",
));

return redirect()->route('pesanan.show', $pesanan->pelanggan_id)->with('sukses', "Pesanan berhasil di Diselesaikan");

    }



    public function terimasemuapesanan($id){

     

        Pesanan::where('pelanggan_id',$id)->update(array(
            'status'=>"Pesanan Diterima",
));

return redirect()->route('pesanan.show', $id)->with('sukses', 'Pesanan berhasil di terima');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = User::findOrfail($id);
        $treatment = Pesanan::where('pelanggan_id', $id)->get();
        $total = Pesanan::where('pelanggan_id', $id)->sum('harga_pesanan');
        return view('pesanan.show', compact('treatment', 'pelanggan', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
