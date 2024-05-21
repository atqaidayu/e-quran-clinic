<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tutors')->insert([
            [
                'name' => 'Ahmed Ali',
                'about' => 'Experienced tutor in tajweed.',
                'phone_num' => '1234567890',
                'email' => 'ahmedali@example.com',
                'password' => bcrypt('password123'), // Always hash passwords
                'profile_picture' => 'profile_pictures/ahmedali.png',
                'age' => 35,
                'gender' => 'male',
                'document' => 'documents/ahmedali.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fatima Zahra',
                'about' => 'Professional Arabic and Quran tutor.',
                'phone_num' => '0987654321',
                'email' => 'fatimazahra@example.com',
                'password' => bcrypt('password123'), // Always hash passwords
                'profile_picture' => 'profile_pictures/fatimazahra.png',
                'age' => 28,
                'gender' => 'female',
                'document' => 'documents/fatimazahra.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Yusuf Khan',
                'about' => 'Expert in tajweed and hafazan.',
                'phone_num' => '1122334455',
                'email' => 'yusufkhan@example.com',
                'password' => bcrypt('password123'), // Always hash passwords
                'profile_picture' => 'profile_pictures/yusufkhan.png',
                'age' => 40,
                'gender' => 'male',
                'document' => 'documents/yusufkhan.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aisha Omar',
                'about' => 'Skilled in teaching Quran and Iqra.',
                'phone_num' => '5566778899',
                'email' => 'aishaomar@example.com',
                'password' => bcrypt('password123'), // Always hash passwords
                'profile_picture' => 'profile_pictures/aishaomar.png',
                'age' => 32,
                'gender' => 'female',
                'document' => 'documents/aishaomar.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
