<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'level_code' => '01',
            'level_name' => 'D3'
        ]);

        Level::create([
            'level_code' => '02',
            'level_name' => 'D4'
        ]);

        Level::create([
            'level_code' => '03',
            'level_name' => 'S1'
        ]);

        Level::create([
            'level_code' => '04',
            'level_name' => 'S2'
        ]);
    }
}
