<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    /**
     * 为指定用户显示详情
     *
     * @param int $id
     * @return Response
     * @author LaravelAcademy.org
     */
    public function showProfile(Request $request)
    {

        return "{123}".$request->input("name");//http://localhost:8080/api/user/profile?name=123
    }

    public function testCurl()
    {
        Log::info('Showing user profile for user: "http://localhost:3050/eeeee"');
        return $this->getUrl2("http://localhost:3050/eeeee");//http://localhost:8080/api/user/asd
    }

    private function getUrl2($url){
        $headerArray =array("Content-type:application/json;","Accept:application/json");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
        return $output;
    }
}
