<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.data_master.menus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.data_master.menus.create');
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
            'menu_number' => 'required',
            'menu_parent' => 'required',
            'menusub' => 'required',
            'role_menu' => 'required',
            'menu_icon' => 'required',
        ]);

        $data = [
            'name_menu' => $request->input('name'),
            'menu' => $request->input('menu_number'),
            'menu_parent' => $request->input('menu_parent'),
            'menu_has_sub' => $request->input('menusub'),
            'menu_role_access' => $request->input('role_menu'),
            'menu_icon' => $request->input('menu_icon'),
            'menu_endpoint' => $request->input('menu_endpoint')
        ];

        $api = env('LINK_API');
        $url = $api.'/menus';

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

        return view('contents.data_master.menus.index', [
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
        //
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
        //
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
