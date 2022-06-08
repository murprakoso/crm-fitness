<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        return view('profile.index', ['user' => User::find($userId)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:30',
            'email'    => 'required|email|unique:users,email,' . $profile->id,
            'password' => 'confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            $input = $request->all();
            if (!empty($input['password'])) {
                $input['password'] = bcrypt($input['password']);
            } else {
                $input = Arr::except($input, array('password'));
            }
            $profile->update($input);

            Auth::guard('web')->logout();

            session()->flash('success', 'Profil berhasil ubah, silahkan login kembali.');
            return redirect()->route('login');
        } catch (\Throwable $th) {
            session()->flash('error', 'Terjadi kesalahan saat menyimpan data. ' . $th->getMessage());
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Device wa
     */
    public function device()
    {
        $userId = auth()->user()->id;
        return view('devices.index', ['profile' => User::find($userId)]);
    }

    public function deviceUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            User::where('id', $request->id)->update(['phone' => $request->phone]);

            session()->flash('success', 'Device berhasil diubah.');
            return redirect()->back();
        } catch (\Throwable $th) {
            session()->flash('error', 'Device gagal diubah. ' . $th->getMessage());
            return redirect()->back();
        }
    }
}
