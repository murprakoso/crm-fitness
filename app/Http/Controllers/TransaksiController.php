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
        $transaksis = Transaksi::orderBy('transaksis.id', 'desc');

        if ($request->q) {
            $transaksis->search($request->q);
        }

        return view('transaksi.index', [
            'transaksis' => $transaksis->paginate(10)->appends([
                'q' => $request->q
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $member = null;
        if ($request->member) {
            $member = Member::findOrFail($request->member);
        }
        return view('transaksi.form', compact('member'));
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
        $input['tipe_member'] = $request->member;

        $input['masa_tenggang'] = $input['tanggal_daftar'];
        if ($request->member == 'tetap') {
            $input['masa_tenggang'] = date("Y-m-d", strtotime("+1 month", strtotime($input['tanggal_daftar'])));
        }

        try {
            Transaksi::create($input);
            Member::find($request->nama)->update([
                'status'        => $this->_status($input['masa_tenggang']), //1:aktif,2:tidak aktif,3:masa tenggang
                'tipe_member'   => $request->member,
                'jenis_member'  => $request->jenis_member,
                'masa_tenggang' => $input['masa_tenggang']
            ]);

            session()->flash('success', 'Transaksi berhasil ditambahkan.');
            return redirect()->route('transaksi.index');
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
    public function edit(Transaksi $transaksi)
    {
        $member = Member::findOrFail($transaksi->member_id);
        return view('transaksi.form', compact('transaksi', 'member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $input = $request->except('_token', 'nama');
        $input['member_id'] = $request->nama;
        $input['tanggal_daftar'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->tanggal_daftar)));
        $input['tipe_member'] = $request->member;

        $input['masa_tenggang'] = $input['tanggal_daftar'];
        if ($request->member == 'tetap') {
            $input['masa_tenggang'] = date("Y-m-d", strtotime("+1 month", strtotime($input['tanggal_daftar'])));
        }

        try {
            $transaksi->update($input);
            Member::find($request->nama)->update([
                'status'        => $this->_status($input['masa_tenggang']), //1:aktif,2:tidak aktif,3:masa tenggang
                'tipe_member'   => $request->member,
                'jenis_member'  => $request->jenis_member,
                'masa_tenggang' => $input['masa_tenggang']
            ]);

            session()->flash('success', 'Transaksi berhasil diubah.');
            return redirect()->route('transaksi.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Transaksi gagal diubah. ' . $th->getMessage());
            return redirect()->back();
        }
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

    //1:aktif,2:tidak aktif,3:masa tenggang
    private function _status($tglDaftar)
    {
        $currDate = date('Y-m-d');
        if ($tglDaftar < $currDate) {
            return 3;
        }
        return 1;
    }
}
