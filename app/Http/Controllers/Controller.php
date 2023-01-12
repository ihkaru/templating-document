<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responsejson($code,$data,$message = ''){
        $status = ($code>=200 && $code<300)?true:false;
        if($message == ''){
            return response()->json([
                "status"=>$status,
                "code"=>$code,
                "data"=>$data
            ],$code);
        }else{
            return response()->json([
                "status"=>$status,
                "code"=>$code,
                "data"=>$data,
                "message"=>$message
            ],$code);
        }
    }

    public function responseabort($code,$message){
        return $this->responsejson($code,["message"=>$message]);
    }

    public function emptyHandler(String $key){
        if(request($key)){
            return request($key);
        }else{
            if(request()->exists($key)){
                return "";
            }else {
                return null;
            }
        }
    }
}
