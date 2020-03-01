<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHTTP\Client;
use App\Model\GitUserModel;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redis;
use App\Model\RegisterModel;

class GithubController extends Controller
{
    //github登录
    public function index(){
        return view('github.index');
    }
    public function callback(){
        $cilent = new Client();

        //获取code
        $code = $_GET['code'];
        //根据code,获取access_token
        $url = 'https://github.com/login/oauth/access_token';

        $response = $cilent->request("POST",$url,[
            //携带headers
            'headers'   =>  [
                'Accept'    =>  'application/json'
            ],
            'form_params' => [
                'client_id' =>  env('GITHUB_CLIENT_ID'),
                'client_secret' =>  env('GITHUB_CLIENT_SECRET'),
                'code'  =>  $code
            ]
        ]);
        $body = $response->getBody();
        echo $body; echo "<hr>";

        $info = json_decode($body,true);

        $access_token = $info['access_token'];

        //TODO使用$access_token获取用户信息
        $uri="https://api.github.com/user";
        $arr=$client->request("GET",$uri,[
            'headers'=>[
                'Authorization'  =>'token '.$access_token
            ]
        ]);

        $res=$arr->getBody();
        $userinfo=json_decode($res,true);
        //print_r($userinfo);

        //判断用户是否存在  不存在则入库
        $user=GitUserModel::where(['github_id'=>$userinfo['id']])->first();
        $uid=$user->uid;
        if($user){
            //echo "欢迎回来";echo "<hr>";
        }else{
            //在用户主表中记录用户信息
            $u_data=[
                'email' =>$userinfo['email']
            ];
            //生成主表uid  关联github_user用户表
            $uid=RegisterModel::insertGetId($u_data);


            //在github_user表中记录用户信息
            //echo "欢迎欢迎新用户";echo "<hr>";
            $git_info=[
                'uid'           =>$uid,
                'github_id'    =>$userinfo['id'],
                'location'     =>$userinfo['location'],
                'email'        =>$userinfo['email']
            ];
            $gid=GitUserModel::insertGetId($git_info);

            if($gid>0){

            }else{

            }
        }


        //执行登录逻辑
        //生成token标识 返给客户端（存入cookie）
        $token=str::random(16);
        Cookie::queue('token',$token,60);

        //将token保存到redis中
        $redis_token="token:".$token;
        $token_info=[
            'uid'            =>$uid,
            'login_time'    =>time()
        ];

        Redis::hMset($redis_token,$token_info);
        Redis::expire($redis_token,60*60);

        echo "<script>alert('登录成功 正在为你跳转到个人中心');location.href='/center';</script>";


    }
}



























