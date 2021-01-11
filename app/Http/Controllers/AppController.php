<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function index(Request $request){
        $data        =   json_decode(file_get_contents(storage_path('data.json')), true);
        return view('index',[
            'list' => $data
        ]);
    }
}
