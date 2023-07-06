<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RajaOngkirController extends Controller
{
    public function __construct()
    {
        $urlRajaOngkir = env("RAJANG_ONGKIR_URL","https://api.rajaongkir.com");
    }
    //
    public function getProvince(Request $request){
        $response = Http::get($this->urlRajaOngkir.'/province',[
            'api'=>$request->header('key')
        ]);
        return $response;
    }
}
