<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin.fmtcs@gmail.com',
            'password' => Hash::make('P@ssw0rd'),
            'address' => '1st Street New Asinan Olongapo City, Zambales',
            'role' => 'ADMIN',
            'phone' => '09999999999',
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user.fmtcs@gmail.com',
            'password' => Hash::make('P@ssw0rd'),
            'address' => '1st Street New Asinan Olongapo City, Zambales',
            'role' => 'USER',
            'phone' => '09999999999',
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
