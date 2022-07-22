<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        if ($request->get('q')) {
            $members->search($request->q);
        }

        // $countAllMembers = Member::all()->count();

        return view('member.index', [
            'members' => $members->paginate(10)->appends([
                'q'     => $request->get('q')
            ]),
            'statuses' => Member::statuses(),
            'countMembers' => $members->count()
        ]);
    }


    public function select(Request $request)
    {
        $member = [];
        if ($request->has('q')) {
            $member = Member::select('id', 'nama')->name($request->q)->get();
        } else {
            $member = Member::select('id', 'nama')->get();
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
        return view('member.form');
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
            'nama'   => 'required',
            'alamat' => 'required',
            'gender' => 'required',
            'no_hp'  => 'required',
            'job'    => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $input = $request->all();
        $input['no_hp'] = phone_number($request->no_hp);

        if ($request->foto) {
            $input['foto'] = $this->_uploadImage($request);
        }

        try {
            Member::create($input);

            session()->flash('success', 'Member berhasil disimpan.');
            return redirect()->route('member.index');
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal disimpan. ' . $th->getMessage());
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
        return view('member.show', [
            'member' => Member::find($id),
            'transaksis' => Transaksi::where('member_id', $id)->paginate(10)
        ]);
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
        $input['no_hp'] = phone_number($request->no_hp);
        $input['tanggal_daftar'] = date('Y-m-d', strtotime(str_replace("/", "-", $request->tanggal_daftar)));

        $input['masa_tenggang'] = $input['tanggal_daftar'];
        if ($request->member == 'tetap') {
            $input['masa_tenggang'] = date("Y-m-d", strtotime("+1 month", strtotime($input['tanggal_daftar'])));
        }

        if ($request->foto) {
            $input['foto'] = $this->_uploadImage($request);
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
            if ($member->foto) {
                $filePath = public_path('images/' . $member->foto);
                if (File::exists($filePath)) {
                    unlink($filePath);
                }
            }

            $member->delete();
            session()->flash('success', 'Member berhasil dihapus.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Member gagal dihapus. ' . $th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Upload image/avatar
     */
    private function _uploadImage($request)
    {
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);
        # hapus gambar lama
        if ($request->old_image != null) {
            $filePath = public_path('images/' . $request->old_image);
            if (File::exists($filePath)) {
                unlink($filePath);
            }
        }
        // $input['foto'] = $imageName;
        return $imageName; // return nama file
    }
}
