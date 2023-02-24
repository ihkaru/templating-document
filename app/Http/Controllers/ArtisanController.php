<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function run(){
        if(!request("secret")){
            abort(401,"Unauthorized Access");
        }
        if(request("secret") != "123password123"){
            abort(401,"Unauthorized Access");
        }
        $exitCode = collect([]);
        $exitCode->push($this->migration());
        return $this->responsejson(200,["exitCode"=>$exitCode]);
    }

    public function migration(){
        $migration = collect([]);
        $output = new \Symfony\Component\Console\Output\BufferedOutput;
        if(request("freshseed")){
            Artisan::call("migrate:fresh --seed",[],$output);
            return $output->fetch();
        }
        if(request("fresh")){
            Artisan::call("migrate:fresh",[],$output);
            return $output->fetch();
        }
        if(request("migrate")){
            Artisan::call("migrate",[],$output);
            return $output->fetch();
        }
        if(request("seed")){
            Artisan::call("db:seed",[],$output);
            return $output->fetch();
        }
        if(request("cache-clear")){
            Artisan::call("cache:clear",[],$output);
            return $output->fetch();
        }
        if(request("storage-link")){
            Artisan::call("storage:link",[],$output);
            return $output->fetch();
        }
    }
}
