<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataHarga = Harga::all();
        return view('harga.index', compact('dataHarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('harga.form');
    }

    public function select(Request $request)
    {
        $harga = [];
        if ($request->has('q')) {
            $harga = Harga::select('harga', 'keterangan')->search($request->q)->get();
        } else {
            $harga = Harga::select('harga', 'keterangan')->get();
        }
        return response()->json($harga);
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
            'gender'     => 'required|string',
            'keterangan' => 'required|string|max:100',
            'harga'      => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $params = $request->except(['_token']);
            Harga::create($params);

            session()->flash('success', 'Harga baru berhasil ditambahkan.');
            return redirect()->route('harga.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Harga gagal ditambahkan. ' . $th->getMessage());
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
        return view('harga.form', ['harga' => Harga::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Harga $harga)
    {
        $validator = Validator::make($request->all(), [
            'gender'     => 'required|string',
            'keterangan' => 'required|string|max:100',
            'harga'      => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $params = $request->except(['_token', '_method']);
            $harga->update($params);

            session()->flash('success', 'Harga berhasil diubah.');
            return redirect()->route('harga.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Harga gagal diubah. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Harga $harga)
    {
        try {
            $harga->delete();
            session()->flash('success', 'Harga berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Harga gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
