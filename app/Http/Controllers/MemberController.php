<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countAllMembers = Member::all()->count();
        $members = Member::paginate(10);
        // $members->paginate(10)->appends([ #with query string ])

        return view('member.index', ['members' => $members, 'countMembers' => $countAllMembers]);
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
        dd($member);
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
