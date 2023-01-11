<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::whereHas("penunjukJalan");
        if(!request("koseka") && !request("pml") && !request("ppl")){
            return "Kode koseka/pml harus diisi pada link. Misal /?koseka=12000 untuk koseka nomor 12 atau /?pml=12030 untuk dengan 12030 adalah kode pml";
        }
        if(request("koseka")){
            if(count(Petugas::where("id","like",substr(request("koseka"),0,2)."%")->get())==0){
                return "Tidak ada Koseka dengan kode petugas ".request("koseka");
            }
            $petugas->where("id","like",substr(request("koseka"),0,2)."%")
                            ->where("jabatan","PPL")
                            ->with(["penunjukJalan.sls"]);
        }
        if(request("pml")){
            if(count(Petugas::where("id","like",substr(request("ppl"),0,4)."%")->get())==0){
                return "Tidak ada PML dengan kode petugas ".request("pml");
            }
            $petugas->where("id","like",substr(request("pml"),0,4)."%")
            ->where("jabatan","PPL")
            ->with(["penunjukJalan.sls"]);
        }
        if(request("ppl")){
            if(count(Petugas::where("id","like",substr(request("ppl"),0,5))->get())==0){
                return "Tidak ada PML dengan kode petugas ".request("ppl");
            }
            $petugas->where("id","like",substr(request("ppl"),0,5))
            ->where("jabatan","PPL")
            ->with(["penunjukJalan.sls"]);
        }
        return view("index",[
            "petugas"=>$petugas->get()
        ]);
    }


}
