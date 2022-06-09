<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = Member::orderBy('id', 'desc');

        if ($request->get('jenis') && !$request->get('tipe')) {
            // when only jenis
            $members->jenis($request->jenis)->search($request->q);
        } elseif (!$request->get('jenis') && $request->get('tipe')) {
            // when only tipe
            $members->tipe($request->tipe)->search($request->q);
        } elseif ($request->get('jenis') && $request->get('tipe')) {
            // when jenis & type
            $members->tipe($request->tipe)->jenis($request->jenis)->search($request->q);
        }

        // $countAllMembers = Member::all()->count();

        return view('member.index', ['members' => $members->paginate(10)->appends(['jenis' => $request->get('jenis'), 'tipe' => $request->get('tipe'), 'q' => $request->get('q')]), 'countMembers' => $members->count()]);
    }


    public function select(Request $request)
    {
        $member = [];
        if ($request->has('q')) {
            $member = Member::select('id', 'nama', 'tanggal_daftar', 'masa_tenggang')->search($request->q)->get();
        } else {
            $member = Member::select('id', 'nama', 'tanggal_daftar', 'masa_tenggang')->get();
        }
        return response()->json($member);
    }

    public function jobs()
    {
        $memberJobs = Member::jobs();
        $jobs = [];
        foreach ($memberJobs as $key => $val) {
            $jobs[] = ['body' => $val, 'id' => $val];
        }
        return response()->json($jobs);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('member.show', ['member' => Member::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('member.form', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $input = $request->all();
        // dd($input);

        $input['no_hp'] = phone_number($request->no_hp);
        $input['tanggal_daftar'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->tanggal_daftar)));

        $input['masa_tenggang'] = $input['tanggal_daftar'];
        if ($request->member == 'tetap') {
            $input['masa_tenggang'] = date("Y-m-d", strtotime("+1 month", strtotime($input['tanggal_daftar'])));
        }

        if ($request->foto) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);

            # hapus gambar lama
            if ($request->old_image != null) {
                $filePath = public_path('images/' . $request->old_image);
                if (File::exists($filePath)) {
                    unlink($filePath);
                }
            }

            $input['foto'] = $imageName;
        }

        try {
            $member->update($input);

            session()->flash('success', 'Member berhasil diubah.');
            return redirect()->route('member.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal diubah. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        try {
            $member->delete();
            session()->flash('success', 'Member berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
