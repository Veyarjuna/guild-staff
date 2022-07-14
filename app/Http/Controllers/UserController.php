<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.data_master.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.data_master.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3|max:255',
            'gender' => 'required'
        ]);
        $data = [
            'user_name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'img_profil' => "localhost:5000/src/img/profil.png",
            'gender' => $request->input('gender')
        ];

        $api = env('LINK_API');
        $url = $api.'/users';

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $res = $client->request('POST',$url,['body' => json_encode($data)]);

        if($res->getStatusCode() == 200){
            $response_data = $res->getBody()->getContents();
        }else{
            $response_data = $res->getBody()->getContents();
        }
        $respon_json = json_decode($response_data);

        return view('contents.data_master.users.index', [
            'data' => $respon_json
        ]);
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
        $api = env('LINK_API');
        $client = new Client();

        $res= $client->get($api.'/users/'.$id);
        $response_data = $res->getBody()->getContents();
        $respon_json = json_decode($response_data);
        
        return view('contents.data_master.users.edit',[
            'data' => $respon_json->data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $api = env('LINK_API');
        $url=$api.'/users/'.$id;
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'gender' => 'required'
        ]);

        $data = [
            'user_name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'img_profil' => "localhost:5000/src/img/profil.png",
            'gender' => $request->input('gender')
        ];

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $res = $client->request('PATCH',$url,['body' => json_encode($data)]);
        if($res->getStatusCode() == 200){
            $response_data = $res->getBody()->getContents();
        }else{
            $response_data = $res->getBody()->getContents();
        }
        $respon_json = json_decode($response_data);

        return view('contents.data_master.users.index', [
            'data' => $respon_json
        ]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
