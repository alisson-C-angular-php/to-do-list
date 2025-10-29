<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        UserModel::create([
            'name' => 'Alisson Pereira',
            'email' => 'alisson@example.com',
            'password' => Hash::make('123456'),
        ]);

        UserModel::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
