<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;

class Getcontroller extends Controller
{
    //获取accesstoken接口
    public function GetAccessToken(Request $request){
        $appid = $request->get('appid');
        $appsecret = $request->get('appsecret');

        //判断
        if(empty($appid) || empty($appsecret)){
            echo "缺少用户信息";die;
        }
        echo "appid:".$appid;echo "<br>";
        echo "appsecret:".$appsecret;echo "<br>";

        //为用户生成AccessToken,
        $str = $appid . $appsecret . time() . mt_rand() . Str::random(16);
        echo "str:" . $str; echo "<br>";
        $access_token = sha1($str) . md5($str);
        echo 'access_token:' . $access_token; echo "<br>";
        $redis_h_key = "h:access_token:" . $access_token;
        echo "redis_h_key:" . $redis_h_key; echo "<br>";

        $app_info = [
            'appid' =>$appid,
            'addtime'   =>date('Y-m-d h:i:s')
        ];
        Redis::hmset($redis_h_key,$app_info);
        Redis::expire($redis_h_key,72000);

        $response = [
            'error'     => 0,
            'access_token'  => $access_token,
            'expire'    => 7200
        ];
        return $response;
    }

    //
    public function test(Request $request)
    {
        //验证token是否可用
        $token = $request->get('token');
        if (empty($token)) {
            echo "授权失败缺少access_token";
            die;
        }
        $redis_h_token = 'h:access_token:' . $token;
        $data = Redis::hGetAll($redis_h_token);
        if (empty($data)) {
            echo "授权失败，access_token无效";
            die;
        }

        $data=[
            'name'   =>'lisi',
            'time'   =>date('Y-m-d H:i:s')
        ];
        return $data;
    }

    public function test1(){
        $data=[
            'name'   =>'zhangsan',
            'time'   =>date('Y-m-d H:i:s')
        ];
        return $data;
    }
}
