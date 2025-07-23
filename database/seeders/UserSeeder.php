<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => 1, //Admin
                'name' => 'Admin Klinik',
                'email' => 'admin@klinik.test',
                'password' => Hash::make('admin123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 3, // Dokter
                'name' => 'Dokter Umum',
                'email' => 'dokter@klinik.test',
                'password' => Hash::make('dokter123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 2, //Petugas Pendaftaran
                'name' => 'Petugas Pendaftaran',
                'email' => 'petugas@klinik.test',
                'password' => Hash::make('petugas123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role_id' => 4, //Petugas Pendaftaran
                'name' => 'Kasir',
                'email' => 'kasir@klinik.test',
                'password' => Hash::make('kasir123'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
