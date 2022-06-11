<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\Jruangan;
use App\Customer;
use App\Ruangan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::get();
        $customer = Customer::get();
        $ruangan = Ruangan::get();

        return view('amogus.m_transaksi', compact('transaksi', 'customer', 'ruangan'));
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
            'id_ruangan' => ['required', 'max:255'],
            'id_customer' => ['required', 'max:255'],
            'tgl_masuk' => ['required', 'max:255'],
        ]);

        $awal = date('d', strtotime($request['tgl_masuk']));
        $akhir = date('d', strtotime($request['tgl_keluar']));
        $jumlah_hari = $akhir - $awal;
        $to_jruangan = Ruangan::where('id_ruangan', $request['id_ruangan'])->value('id_jenis_ruangan');
        $tarif = Jruangan::where('id_jenis_ruangan', $to_jruangan)->value('tarif_ruangan');
        $bayars = $jumlah_hari * $tarif;

        Transaksi::create([
            'id_jenis_ruangan' => $request['id_jenis_ruangan'],
            'id_ruangan' => $request['id_ruangan'],
            'id_customer' => $request['id_customer'],
            'tgl_masuk' => $request['tgl_masuk'],
            'tgl_keluar' => $request['tgl_keluar'],
            'bayar' => $bayars,
        ]);

        $ruangans = Ruangan::where('id_ruangan', $request['id_ruangan']);

        $ruangans->update([
            'status' => 'Terpakai'
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $customer = Customer::get();
        $ruangan = Ruangan::get();

        return view('amogus.e_transaksi', compact('transaksi', 'customer', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();

        $request->validate([
            'id_ruangan' => ['required', 'max:255'],
            'id_customer' => ['required', 'max:255'],
            'tgl_masuk' => ['required', 'max:255'],
            'tgl_keluar' => ['required', 'max:255'],
        ]);

        $awal = date('d', strtotime($request['tgl_masuk']));
        $akhir = date('d', strtotime($request['tgl_keluar']));
        $jumlah_hari = $akhir - $awal;
        $to_jruangan = Ruangan::where('id_ruangan', $request['id_ruangan'])->value('id_jenis_ruangan');
        $tarif = Jruangan::where('id_jenis_ruangan', $to_jruangan)->value('tarif_ruangan');
        $bayars = $jumlah_hari * $tarif;

        $transaksi->update([
            'id_ruangan' => $request['id_ruangan'],
            'id_customer' => $request['id_customer'],
            'tgl_masuk' => $request['tgl_masuk'],
            'tgl_keluar' => $request['tgl_keluar'],
            'bayar' => $bayars,
        ]);

        $ruangans = Ruangan::where('id_ruangan', $request['id_ruangan']);

        $ruangans->update([
            'status' => 'Terpakai'
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        $transaksi = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi Berhasil Di Hapus');
    }
}
