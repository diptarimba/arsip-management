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
        $superadminName = [
            1 => 'Anya Forger',
            2 => 'Loid Forger',
            3 => 'Yor Forger',
            4 => 'Twilight',
            5 => 'Bonman'
        ];

        $adminName = [
           1 => 'Luffy',
           2 => 'Roronoa Zoro',
           3 => 'Nami',
           4 => 'Sanji',
           5 => 'Brook'
        ];

        $userName = [
            1 => 'Aokiji',
            2 => 'Akainu',
            3 => 'Kizaru',
            4 => 'Sengoku',
            5 => 'Issho'
        ];
        for($x = 1; $x < 6; $x++){
            $admin = User::create([
                'name' => $superadminName[$x],
                'username' => 'superadmin'.$x,
                'email' => 'user_'.$x.'@superadmin.net',
                'password' => bcrypt('12345678')
            ]);

            $admin->assignRole('superadmin');
        }

        for($x = 1; $x < 6; $x++){
            $admin = User::create([
                'name' => $adminName[$x],
                'username' => 'admin'.$x,
                'email' => 'user_'.$x.'@admin.net',
                'password' => bcrypt('12345678')
            ]);

            $admin->assignRole('admin');
        }

        for($x = 1; $x < 6; $x++){
            $user = User::create([
                'name' => $userName[$x],
                'username' => 'iamuser'.$x,
                'email' => 'user_'.$x.'@user.net',
                'password' => bcrypt('12345678')
            ]);

            $user->assignRole('user');
        }
    }
}
