<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::create([
            'faculty_code' => '12',
            'faculty_name' => 'Terapan'
        ]);
        Faculty::create([
            'faculty_code' => '13',
            'faculty_name' => 'Economy and Business'
        ]);
        Faculty::create([
            'faculty_code' => '14',
            'faculty_name' => 'Engineer'
        ]);
        Faculty::create([
            'faculty_code' => '15',
            'faculty_name' => 'Industry Creative'
        ]);
        Faculty::create([
            'faculty_code' => '16',
            'faculty_name' => 'Comunication and Information'
        ]);
        Faculty::create([
            'faculty_code' => '17',
            'faculty_name' => 'Informatics and Technology'
        ]);
    }
}
