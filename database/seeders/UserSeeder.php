<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Daffa',
            'nomor_telepon' => '08123456789',
            'alamat' => 'Bandung',
            'email' => 'dafiraone@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Daffa'),
        ]);
        
        DB::table('users')->insert([
            'nama' => 'Irawan',
            'nomor_telepon' => '08987654321',
            'email' => 'irawan@gmail.com',
            'password' => Hash::make('Irawan'),
        ]);
    }
}
