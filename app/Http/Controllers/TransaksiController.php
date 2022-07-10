<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $member = null;
        if ($request->member) {
            $member = Member::findOrFail($request->member);
        }
        return view('transaksi.form', compact('member'));
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
        $input = $request->except('_token', 'nama');
        $input['member_id'] = $request->nama;
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
            Transaksi::create($input);
            Member::find($request->nama)->update([
                'status'        => 1, //1:aktif,2:tidak aktif,3:masa tenggang
                'tipe_member'   => $request->member,
                'jenis_member'  => $request->jenis_member,
                'masa_tenggang' => $input['masa_tenggang']
            ]);

            session()->flash('success', 'Transaksi berhasil ditambahkan.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Transaksi gagal ditambahkan. ' . $th->getMessage());
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
        try {
            Transaksi::find($id)->delete();

            session()->flash('success', 'Transaksi berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Transaksi gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
