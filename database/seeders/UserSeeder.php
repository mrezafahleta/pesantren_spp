<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'ADMIN',
            'nim_murid' => 0,
            'email' => 'adminpesantren@gmail.com',
            'password' => bcrypt('12345678'),
            'status' => 'AKTIF',
            'role_id' => 1
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name' => 'Ejak',
            'nim_murid' => 1,
            'email' => 'ejak@gmail.com',
            'password' => bcrypt('06Arsenal'),
            'status' => 'AKTIF',
            'role_id' => 2
        ]);

        $user->assignRole('User');
    }
}
