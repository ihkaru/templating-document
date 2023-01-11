<?php

namespace Database\Seeders;

use App\Models\Petugas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("./database/seeders/petugas.csv"), "r");

        $firstline = true;

        $petugas = [];
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if ($firstline) {
                $firstline = false;
                continue;
            }

            $petugas[] = [
                "id"=> substr($data[0],1),
                "jabatan"=>$data[1],
                "nama"=>$data[2]
            ];
        }

        foreach (array_chunk($petugas, 1000) as $i) {
            Petugas::insert($i);
        }
        fclose($csvFile);
    }
 }

