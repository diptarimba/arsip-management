<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for($x = 1; $x < 6; $x++){
            $admin = User::create([
                'name' => 'I am Admin',
                'username' => 'admin'.$x,
                'email' => 'admin'.$x.'@example.net',
                'password' => bcrypt('12345678')
            ]);

            $admin->assignRole('admin');
        }

        $user = User::create([
            'name' => 'I am User',
            'username' => 'iamuser',
            'email' => 'user@example.net',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');
    }
}
