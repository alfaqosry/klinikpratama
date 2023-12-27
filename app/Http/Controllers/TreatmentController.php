<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Models\Layanan;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $treatment = Treatment::where('layanan_id', $id)->get();

        $layanan = Layanan::findOrFail($id);
        return view('treatment.index', compact('treatment', 'layanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('treatment.create', compact('layanan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->layanan_id);
        $request->validate([
            'treatment' => 'required',
            'harga' => 'required',

        ]);

        $treatment = $request->all();
        Treatment::create($treatment);

        return redirect()->route('treatment.index', $request->layanan_id)->with('sukses', 'Treatment berhasil di tambahkan');
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
        $treatment = Treatment::findOrFail($id);
        return view('treatment.edit', compact('treatment'));
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
        $treatment = Treatment::findorfail($id);
        $treatment->update($request->all());
        return redirect()->route('treatment.index', $treatment->layanan_id)->with('sukses', 'Tratment berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $treatment = Treatment::findorfail($id);
            $treatment->delete();

            return redirect()->route('treatment.index', $treatment->layanan_id)->with('sukses', 'Treatment berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('sukses', 'Maaf, Masih ada data yang terpaut dengan Treatment ini.');
        }
    }
}
