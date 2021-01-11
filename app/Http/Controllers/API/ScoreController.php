<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoreController extends Controller
{

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return Response
     */
    public function get($number)
    {
        $data        =   json_decode(file_get_contents(storage_path('data.json')), true);
        $player = [];
        foreach ($data as $item) {
            if ($item['Score'] > $number) {
                $player[] = $item;
            }
        }
        return $player;
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $playerName)
    {
        $nemScore = $request->get('score');
        $data        =   json_decode(file_get_contents(storage_path('data.json')), true);
        $player = [];
        foreach ($data as $item) {
            if ($item['Player'] == $playerName) {
                $item['Score'] = $nemScore;
            }
            $player[] = $item;
        }
        $fp = fopen(storage_path('data.json'), 'w');
        fwrite($fp, json_encode($player));
        fclose($fp);
        return ['success' => true];
    }
}
