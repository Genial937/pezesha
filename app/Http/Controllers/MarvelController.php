<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MarvelController extends Controller
{
    public function index(){
        $ts = Carbon::now()->timestamp;
        $public_key = "2f4b01eb2dfea0d4ac8f06f3580a233f";
        $private_key = "5fcdf8318783ec4084814c2d5de291e3ccc3e3eb";
        $hash = md5($ts.$private_key.$public_key);
        $url = "https://gateway.marvel.com:443/v1/public/characters?ts=".$ts."&apikey=".$public_key."&hash=".$hash;
      //  dd($url);
        $results = $this->http_get_request($url);
        dd(json_decode($results));
        return $results;
    }

    private function http_get_request($url){
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
            )
        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }
}
