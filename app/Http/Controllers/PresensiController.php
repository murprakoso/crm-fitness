<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $presensis = Presensi::latest();

        if ($request->q || $request->tanggal) {
            $date = $request->tanggal
                ? date('Y-m-d', strtotime(str_replace("/", "-", $request->tanggal)))
                : null;
            $presensis->filter($request->q, $date);
        }

        return view('presensi.index', [
            'presensis' => $presensis->paginate(10)->appends([
                'q'       => $request->q,
                'tanggal' => $request->tanggal
            ])
        ]);
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
        $validator = Validator::make($request->all(), [
            'member' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            Presensi::create([
                'member_id'  => $request->member,
                'keterangan' => 'Hadir'
            ]);
            session()->flash('success', 'Presensi berhasil disimpan.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Presensi gagal disimpan. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensi  $presensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensi $presensi)
    {
        try {
            $presensi->delete();
            session()->flash('success', 'Presensi berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Presensi gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
