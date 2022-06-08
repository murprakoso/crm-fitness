<?php

namespace App\Http\Controllers;

use App\Models\Member;
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
        return view('transaksi.index');
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
        $input = $request->all();
        $input['no_hp'] = phone_number($request->no_hp);
        $input['tanggal_daftar'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->tanggal_daftar)));

        $input['masa_tenggang'] = $input['tanggal_daftar'];
        if ($request->member == 'tetap') {
            $input['masa_tenggang'] = date("Y-m-d", strtotime("+1 month", strtotime($input['tanggal_daftar'])));
        }

        if ($request->foto) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);

            $input['foto'] = $imageName;
        }

        try {
            Member::create($input);

            session()->flash('success', 'Member berhasil ditambahkan.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal ditambahkan. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /** perpanjang member */
    public function perpanjang(Request $request)
    {
        $idMember = $request->id_member;
        $masaTenggang = date('Y-m-d', strtotime(str_replace("/", "-", $request->masa_tenggang)));

        try {
            Member::where('id', $idMember)
                ->update(['masa_tenggang' => $masaTenggang, 'harga' => $request->harga]);

            session()->flash('success', 'Member berhasil diperpanjang.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal diperpanjang. ' . $th->getMessage());
            return redirect()->back();
        }
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
