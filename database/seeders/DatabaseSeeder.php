<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Dela Cruz ',
            'contact' => '09123456789',
            'address' => 'Sulivan, Baliwag ,Bulacan',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'activated' => 1,
            'role' => 1,
        ]);
    }
}
