<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rentals')->insert([
            'id_customer' => 2,
            'id_konsol' => '1',
            'mulai' => Carbon::now(),
            'selesai' => Carbon::now()->addHour(),
        ]);

        DB::table('rentals')->insert([
            'id_customer' => 1,
            'id_konsol' => 2,
            'mulai' => Carbon::now(),
            'selesai' => Carbon::now()->addHour(),
        ]);
    }
}
