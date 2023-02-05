<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=\App\Models\Role::create([

            'name'=>'Admin',
            'display_name'=>'Admin',
            'description'=>'can do everything',

        ]);
        $user=\App\Models\Role::create([

            'name'=>'user',
            'display_name'=>'user',
            'description'=>'can do specific everything',

        ]);
    }
}
