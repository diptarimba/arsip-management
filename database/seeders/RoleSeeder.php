<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'name' => 'superadmin', 'guard_name' => 'web'],
            [ 'name' => 'admin', 'guard_name' => 'web'],
            [ 'name' => 'user', 'guard_name' => 'web'],
        ];

        Role::insert($data);
    }
}
