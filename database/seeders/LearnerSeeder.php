<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First set of data
        DB::table('learners')->insert([
            'tutor_id' => null,
            'name' => 'Auni Afeeqah',
            'gender' => 'Female',
            'age' => 25,
            'phone_num' => '0182015404',
            'password' => bcrypt('password123'), // You should hash the password
            'proficiency_level' => 'Intermediate',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Second set of data
        DB::table('learners')->insert([
            'tutor_id' => null,
            'name' => 'Muhd Asyraf',
            'gender' => 'Male',
            'age' => 30,
            'phone_num' => '0123456789',
            'password' => bcrypt('abc12345'), // You should hash the password
            'proficiency_level' => 'Advanced',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
