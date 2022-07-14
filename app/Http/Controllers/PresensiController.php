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
    public function index()
    {
        $presensis = Presensi::latest()->paginate(10);
        return view('presensi.index', compact('presensis'));
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
