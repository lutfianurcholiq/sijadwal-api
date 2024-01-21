<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'faculty_id' => 1,
            'major_code' => '121',
            'major_name' => 'Accounting Information System'
        ]);

        Major::create([
            'faculty_id' => 1,
            'major_code' => '122',
            'major_name' => 'Informatics Engineer'
        ]);

        Major::create([
            'faculty_id' => 2,
            'major_code' => '131',
            'major_name' => 'Accounting'
        ]);

        Major::create([
            'faculty_id' => 2,
            'major_code' => '132',
            'major_name' => 'Management'
        ]);

        Major::create([
            'faculty_id' => 3,
            'major_code' => '141',
            'major_name' => 'Electro'
        ]);

        Major::create([
            'faculty_id' => 3,
            'major_code' => '142',
            'major_name' => 'Phyisics'
        ]);

        Major::create([
            'faculty_id' => 4,
            'major_code' => '151',
            'major_name' => 'Design Interior'
        ]);
        Major::create([
            'faculty_id' => 4,
            'major_code' => '152',
            'major_name' => 'Design UI/UX'
        ]);

        Major::create([
            'faculty_id' => 5,
            'major_code' => '161',
            'major_name' => 'Communication'
        ]);

        Major::create([
            'faculty_id' => 5,
            'major_code' => '162',
            'major_name' => 'Business Intelligent'
        ]);

        Major::create([
            'faculty_id' => 6,
            'major_code' => '171',
            'major_name' => 'Informatics'
        ]);

        Major::create([
            'faculty_id' => 6,
            'major_code' => '172',
            'major_name' => 'Data Engineer'
        ]);
    }
}
