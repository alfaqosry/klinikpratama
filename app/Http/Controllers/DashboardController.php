<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaldiproses = Pesanan::where('pesanans.status', 'Diproses')
        ->distinct()
        ->count();
        $totalterima = Pesanan::where('pesanans.status', 'Pesanan Diterima')
        ->distinct()
        ->count();
        $totalselesai = Pesanan::where('pesanans.status', 'Pesanan Selesai')
        ->distinct()
        ->count();

        $totalditolak = Pesanan::where('pesanans.status', 'Pesanan Ditolak')
        ->distinct()
        ->count();

        $pelanggan = Pesanan::join('users', 'pesanans.pelanggan_id', 'users.id')->distinct()->get(['pelanggan_id', 'name', 'alamat']);
        return view('dashboard.index', compact('pelanggan','totaldiproses', 'totalterima', 'totalselesai', 'totalditolak'));
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
        //
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
