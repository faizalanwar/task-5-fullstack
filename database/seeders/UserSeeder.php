<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => '123',
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => '123',
            ],
        ];

        User::insert($user);
    }
}
