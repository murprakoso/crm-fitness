<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesans = Pesan::paginate(10);
        $jobs = Member::jobs();
        $statuses = Member::statuses();
        return view('pesan.index', compact('pesans', 'jobs', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesan.form', ['statuses' => Member::statuses(), 'jobs' => Member::jobs(), 'genders' => Member::genders()]);
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
            'keterangan' => 'required|string|max:100',
            'pesan'      => 'required',
            'status'     => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $params = $request->except(['_token']);
            // pengiriman ke
            $params['ke'] = ($request->kirimke) ? $request->kirimke : null;
            $params['status'] = $request->kirimke == 'status' ? $request->status : null;
            $params['job'] = $request->kirimke == 'job' ? $request->job : null;
            $params['gender'] = $request->kirimke == 'gender' ? $request->gender : null;

            Pesan::create($params);

            session()->flash('success', 'Pesan berhasil ditambahkan.');
            return redirect()->route('pesan.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Pesan gagal ditambahkan. ' . $th->getMessage());
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
        return view('pesan.form', ['pesan' => Pesan::find($id), 'statuses' => Member::statuses(), 'jobs' => Member::jobs(), 'genders' => Member::genders()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesan)
    {
        $validator = Validator::make($request->all(), [
            'keterangan' => 'required|string|max:100',
            'pesan'      => 'required',
            'status'     => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $params = $request->except(['_token']);

            // pengiriman ke
            $params['ke'] = ($request->kirimke) ? $request->kirimke : null;
            $params['status'] = $request->kirimke == 'status' ? $request->status : null;
            $params['job'] = $request->kirimke == 'job' ? $request->job : null;
            $params['gender'] = $request->kirimke == 'gender' ? $request->gender : null;

            $pesan->update($params);

            session()->flash('success', 'Pesan berhasil diubah.');
            return redirect()->route('pesan.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Pesan gagal diubah. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan)
    {
        try {
            $pesan->delete();
            session()->flash('success', 'Pesan berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Pesan gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
