<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                "id" => "dfkghdfjkg",
                "nama_kelas" => "X RPL 1",
            ],
            [
                "id" => "erte",
                "nama_kelas" => "X RPL 2",
            ],
            [
                "id" => "yyuiy",
                "nama_kelas" => "X RPL 3",
            ]

            
        ]);
    }
}
