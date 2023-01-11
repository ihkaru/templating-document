<?php

namespace Database\Seeders;

use App\Models\SLS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SLSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("./database/seeders/SLS.csv"), "r");

        $firstline = true;

        $sls = [];
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            $sls[] = [
                "id"=> $data[0].$data[2].$data[4].$data[6].$data[9]."0".$data[10],
                "nama"=>$data[11],
                "kdsubsls"=>$data[10],
                "kdsls"=>$data[9],
                "kddesa"=>$data[6],
                "desa"=>$data[7],
                "kdkec"=>$data[4],
                "kec"=>$data[5],
                "kdkab"=>$data[2],
                "kab"=>$data[3],
                "kdprov"=>$data[0],
                "prov"=>$data[1]
            ];
            if($data[10] == "1" || $data[10] == "2"){
                $this->command->info($data[11]." adalah subsls ".$data[10]." dengan id SLS ".$data[0].$data[2].$data[4].$data[6].$data[9]."0".$data[10]);
            }
            if($data[0].$data[2].$data[4].$data[6].$data[9]."0".$data[10] == "6112080011002200"){
                $this->command->info($data[11]." adalah subsls ".$data[10]." dengan id SLS ".$data[0].$data[2].$data[4].$data[6].$data[9]."0".$data[10]);
            }
        }

        foreach (array_chunk($sls, 1000) as $i) {
            SLS::insert($i);
        }
        fclose($csvFile);
    }
}
