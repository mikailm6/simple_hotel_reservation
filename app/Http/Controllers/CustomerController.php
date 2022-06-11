<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::get();

        return view('amogus.m_customer', compact('customer'));
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
            'nik' => ['required', 'max:255'],
            'nama_customer' => ['required', 'max:255'],
            'email_customer' => ['required', 'email'],
            'telp_customer' => ['max:255'],
            'alamat_customer' => ['max:255'],
        ]);

        Customer::create([
            'nik' => $request['nik'],
            'nama_customer' => $request['nama_customer'],
            'email_customer' => $request['email_customer'],
            'telp_customer' => $request['telp_customer'],
            'alamat_customer' => $request['alamat_customer'],
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id_customer)
    {
        $customer = Customer::where('id_customer', $id_customer)->first();

        return view('amogus.e_customer', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_customer)
    {
        $customer = Customer::where('id_customer', $id_customer)->first();

        $request->validate([
            'nik' => ['required', 'max:255'],
            'nama_customer' => ['required', 'max:255'],
            'email_customer' => ['required', 'email'],
            'telp_customer' => ['max:255'],
            'alamat_customer' => ['max:255'],
        ]);

        $customer->update([
            'nik' => $request['nik'],
            'nama_customer' => $request['nama_customer'],
            'email_customer' => $request['email_customer'],
            'telp_customer' => $request['telp_customer'],
            'alamat_customer' => $request['alamat_customer'],
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_customer)
    {
        $customer = Customer::where('id_customer', $id_customer);
        $customer->delete();

        return redirect()->route('customer.index')->with('success', 'Customer Berhasil Di Hapus');
    }
}
