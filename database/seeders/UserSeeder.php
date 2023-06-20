<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB
            ::table("users")
            ->insert([
                [
                    "id" => "sddsfkhdsj",
                    "name" => "Admin",
                    "email" => "admin@gmail.com",
                    "password" => bcrypt("admin"),
                    "role" => 0,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "id" => "fffff",
                    "name" => "Guru",
                    "email" => "guru@gmail.com",
                    "password" => bcrypt("guru"),
                    "role" => 1,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "id" => "dfdsf",
                    "name" => "Siswa",
                    "email" => "siswa@gmail.com",
                    "password" => bcrypt("siswa"),
                    "role" => 2,
                    "created_at" => now(),
                    "updated_at" => now(),
                ]
            ]);
    }
}
