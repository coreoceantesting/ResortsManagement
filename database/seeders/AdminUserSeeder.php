<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Admin::create([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'mobile' =>'9856231478',
            'username' => 'admin@gmail.com',  // Admin username
            'password' => Hash::make('123456789'),  // Admin password (hashed)
        
            // Add other user attributes here if needed
        ]);
    }
}
