<?php

namespace Database\Seeders;

use App\Models\PenunjukJalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenunjukJalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("./database/seeders/PenunjukJalan.csv"), "r");

        $firstline = true;

        $penunjukJalan = [];
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            $penunjukJalan[] = [
                "nama"=>$data[4],
                "sls_id"=>$data[2],
                "petugas_id"=>substr($data[6],1),
                "link"=>$data[5],
            ];
        }

        foreach (array_chunk($penunjukJalan, 1000) as $i) {
            PenunjukJalan::insert($i);
        }
        fclose($csvFile);
    }
}
