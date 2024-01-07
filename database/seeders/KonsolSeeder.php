<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('konsols')->insert([
            'status' => 'aktif',
        ]);
        DB::table('konsols')->insert([
            'status' => 'aktif',
        ]);
    }
}
