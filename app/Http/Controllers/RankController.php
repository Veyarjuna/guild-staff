<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contents.data_master.ranks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contents.data_master.ranks.create');
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
            'name' => 'required',
            'number' => 'required'
        ]);

        $data = [
            'rank_name' => $request->input('name'),
            'minimum_rank' => $request->input('number')
        ];

        $api = env('LINK_API');
        $url = $api.'/ranks';

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

        return view('contents.data_master.ranks.index',[
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

        $res= $client->get($api.'/ranks/'.$id);
        $response_data = $res->getBody()->getContents();
        $respon_json = json_decode($response_data);

        return view('contents.data_master.ranks.edit',[
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
        $url=$api.'/ranks/'.$id;

        $request->validate([
            'name' => 'required',
            'number' => 'required'
        ]);

        $data = [
            'rank_name' => $request->input('name'),
            'minimum_rank' => $request->input('number')
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

        return view('contents.data_master.ranks.index',[
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
