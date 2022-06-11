<?php

namespace App\Http\Controllers;

use App\JRuangan;
use Illuminate\Http\Request;

class JRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jruangan = JRuangan::get();

        return view('amogus.m_jruangan', compact('jruangan'));
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
        $request->validate([
            'nama_ruangan' => ['required', 'max:255'],
            'tipe_ruangan' => ['required', 'max:255'],
            'tarif_ruangan' => ['required', 'max:255'],
        ]);

        JRuangan::create([
            'nama_ruangan' => $request['nama_ruangan'],
            'tipe_ruangan' => $request['tipe_ruangan'],
            'tarif_ruangan' => $request['tarif_ruangan'],
        ]);

        return redirect()->route('jruangan.index')->with('success', 'Jenis Ruangan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JRuangan  $jRuangan
     * @return \Illuminate\Http\Response
     */
    public function show(JRuangan $jRuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JRuangan  $jRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jenis_ruangan)
    {
        $jruangan = JRuangan::where('id_jenis_ruangan', $id_jenis_ruangan)->first();

        return view('amogus.e_jruangan', compact('jruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JRuangan  $jRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jenis_ruangan)
    {
        $jruangan = JRuangan::where('id_jenis_ruangan', $id_jenis_ruangan)->first();

        $request->validate([
            'nama_ruangan' => ['required', 'max:255'],
            'tipe_ruangan' => ['required', 'max:255'],
            'tarif_ruangan' => ['required', 'max:255'],
        ]);

        $jruangan->update([
            'nama_ruangan' => $request['nama_ruangan'],
            'tipe_ruangan' => $request['tipe_ruangan'],
            'tarif_ruangan' => $request['tarif_ruangan'],
        ]);

        return redirect()->route('jruangan.index')->with('success', 'Jenis Ruangan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JRuangan  $jRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jenis_ruangan)
    {
        $jruangan = JRuangan::where('id_jenis_ruangan', $id_jenis_ruangan)->first();
        $jruangan->delete();

        return redirect()->route('jruangan.index')->with('success', 'Jenis Ruangan Berhasil Di hapus');
    }
    
}
