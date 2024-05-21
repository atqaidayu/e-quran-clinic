<?php

namespace Database\Seeders;

use App\Models\Admin; // Replace "Admin" with your actual model class name
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        // Create an admin record
        Admin::create([
            'name' => 'Atiqa Idayu',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'), // Hash the password
            'profile_picture' => file_get_contents(public_path('images/admin.jpeg')), // Read file contents
        ]);
        
        // You can add more admin records here if needed
    }
}
