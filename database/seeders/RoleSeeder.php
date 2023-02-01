<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "role_id" => 1,
            "role" => ['en'=>"super_admin",'ar'=>'الادمن الرئيسي'],
        ]);

        Role::create([
            "role_id" => 2,
            "role" => ['en'=>"admin",'ar'=>'الادمن '],
        ]);

        Role::create([
            "role_id" => 3,
            "role" => ['en'=>"user",'ar'=>'مستخدم'],
        ]);
    }
}
