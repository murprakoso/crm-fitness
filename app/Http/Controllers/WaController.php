<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class WaController extends Controller
{
    public function send(Request $request)
    {
        $pesan = $request->pesan;
        $sessionId = (int) User::find(auth()->user()->id)->phone;
        $url = env('NODE_WA_URL') . '/chats/send-bulk?id=' . $sessionId;

        $members = [];
        if ($request->ke == 'semua') {
            $members = Member::all();
        } else if ($request->ke == 'member') {
            $members = Member::whereIn('id', $request->member)->get();
        } else if ($request->ke == 'job') {
            $members = Member::job($request->job)->get();
        } else if ($request->ke == 'status') {
            $members = Member::status($request->status)->get();
        }

        $params = [];
        foreach ($members as $key => $val) {
            $params[] = [
                'receiver' => $val->no_hp,
                'message' => $pesan
            ];
        }

        $data = json_encode($params);

        # curl send wa
        $res = $this->curl_request('POST', $url, $data);
        return response()->json($res);
    }


    /** CURL */
    public function curl_request($method, $url, $data = [])
    {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        // 'authorization: ' . config('message.token'),
        // 'cache-control: no-cache',
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if (!$result) {
            die("Connection Failure");
        }
        curl_close($curl);
        return json_decode($result, true);
    }
}
