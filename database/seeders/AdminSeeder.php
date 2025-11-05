<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'user' => 'admin',
            'email' => 'admin@example.com',
            'senha' => Hash::make('123456'), // senha segura com hash
        ]);
    }
}
