<?php

namespace App\Http\Controllers;

use App\Ruangan;
use App\Jruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::get();
        $jruangan = Jruangan::get();

        return view('amogus.m_ruangan', compact('ruangan', 'jruangan'));
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
            'id_jenis_ruangan' => ['required', 'max:255'],
            'no_ruangan' => ['required', 'max:255'],
        ]);

        Ruangan::create([
            'id_jenis_ruangan' => $request['id_jenis_ruangan'],
            'no_ruangan' => $request['no_ruangan'],
            'status' => 'Kosong',
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ruangan)
    {
        $jruangan = Jruangan::get();
        $ruangan = Ruangan::where('id_ruangan', $id_ruangan)->first();

        return view('amogus.e_ruangan', compact('ruangan', 'jruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ruangan)
    {
        $ruangan = Ruangan::where('id_ruangan', $id_ruangan)->first();

        $request->validate([
            'id_jenis_ruangan' => ['required', 'max:255'],
            'no_ruangan' => ['required', 'max:255'],
            'status' => ['required', 'max:255'],
        ]);

        $ruangan->update([
            'id_jenis_ruangan' => $request['id_jenis_ruangan'],
            'no_ruangan' => $request['no_ruangan'],
            'status' => $request['status'],
        ]);

        return redirect()->route('ruangan.index')->with('success', 'Ruangan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ruangan)
    {
        $ruangan = Ruangan::where('id_ruangan', $id_ruangan)->first();
        $ruangan->delete();

        return redirect()->route('ruangan.index')->with('success', 'Ruangan Berhasil Di Hapus');
    }
}
