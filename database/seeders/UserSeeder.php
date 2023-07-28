<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Rudi Scheepers-White',
                'email' => 'white.rudi@gmail.com',
                'password' => Hash::make('secret99'),
                'role' => 'admin',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@tickets.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
            [
                'name' => 'Chuck Norris',
                'email' => 'chucknorris@tickets.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Johnny Cash',
                'email' => 'johnnycash@tickets.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            $role = $user['role'];
            unset($user['role']);
            $newUser = User::create($user);
            $newUser->assignRole($role);
        }
    }
}
