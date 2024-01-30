<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Layanan;
use App\Models\Pesanan;
use App\Models\Treatment;
use App\Models\User;
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
        $dokter = User::where('role', 'Admin')->where('username', '!=', 'root')->get();
        $layanan = Layanan::all();
        return view('home.index', compact('layanan','dokter'));
    }

    public function pesanan(){
        $diproses = Pesanan::where('pelanggan_id', auth()->user()->id)->where('status','Diproses')->get();
        $diterima = Pesanan::where('pelanggan_id', auth()->user()->id)->where('status','Pesanan Diterima')->get();
        $selesai = Pesanan::where('pelanggan_id', auth()->user()->id)->where('status','Pesanan Selesai')->get();

       $totaldiproses = Pesanan::where('pelanggan_id', auth()->user()->id)
                    ->where('pesanans.status', 'Diproses')
                    ->distinct()
                    ->count();
       $totalterima = Pesanan::where('pelanggan_id', auth()->user()->id)
                    ->where('pesanans.status', 'Pesanan Diterima')
                    ->distinct()
                    ->count();
       $totalselesai = Pesanan::where('pelanggan_id', auth()->user()->id)
                    ->where('pesanans.status', 'Pesanan Selesai')
                    ->distinct()
                    ->count();
       $totalditolak = Pesanan::where('pesanans.status', 'Pesanan Ditolak')
                    ->distinct()
                    ->count();

        return view('home.pesanan', compact('diproses', 'diterima', 'selesai', 'totaldiproses', 'totalterima', 'totalselesai', 'totalditolak'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function kontak(){

        return view('home.kontak');
     }

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
            'boking' => 'required',


        ]);

        foreach ($request->treatment_id as $item) {
            $harga = Treatment::where('id', $item)->first();
            $pesan = Pesanan::create([
                'treatment_id' => $item,
                'pelanggan_id' => auth()->user()->id,
                'harga_pesanan' => $harga->harga,
                'boking' => $request->boking,
                'status' => "Diproses"


            ]);
        }


        return redirect()->route('home.pesanan')->with('sukses', 'Treatment berhasil di pesan');
    }


    public function profiledokter($id){


        $dokter = User::findorfail($id);
        return view('user.profiledokter' ,compact('dokter'));
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
    public function destroy($id)
    {
        try {
            $pesanan = Pesanan::findorfail($id);
            $pesanan->delete();

            return redirect()->route('home.pesanan')->with('sukses', 'Pesanan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('sukses', 'Maaf, Masih ada data yang terpaut dengan pesanan ini.');
        }
    }
}
