<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Global\GlobalController;
use Carbon\Carbon;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ts = Carbon::now()->timestamp;
        $public_key = env('PUBLIC_KEY');
        $private_key = env('PRIVATE_KEY');
        $hash = md5($ts.$private_key.$public_key);
        $url = "https://gateway.marvel.com:443/v1/public/characters?ts=".$ts."&apikey=".$public_key."&hash=".$hash;
        $results = GlobalController::http_get_request($url);
        $characters = GlobalController::paginate($results->data->results);
        return view('home', compact('characters'));
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
        $ts = Carbon::now()->timestamp;
        $public_key = env('PUBLIC_KEY');
        $private_key = env('PRIVATE_KEY');
        $hash = md5($ts.$private_key.$public_key);
        $url = "https://gateway.marvel.com:443/v1/public/characters/".$id."?ts=".$ts."&apikey=".$public_key."&hash=".$hash;
        $result = GlobalController::http_get_request($url);
        $data = $result->data->results;
        $character = $data[0];
        //dd($character);
        return view('show', compact('character'));
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
