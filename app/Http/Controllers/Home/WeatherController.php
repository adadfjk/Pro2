<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    //

    //  天气接口
    public function weather(Request $request)
    {


        $host = "http://jisutianqi.market.alicloudapi.com";
        $path = "/weather/query";
        $method = "GET";
        $ip = $_GET['ip'];
        $appcode = "650ad0eed63c404e910562b3dd838754";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "ip=".$ip;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
//
        $a=curl_exec($curl);
        $arr= explode("X-Ca-Error-Message: OK",$a);

        return $arr[1];


    }


}
