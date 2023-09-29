<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      $admin =  Role::create(['name' => 'Admin']);
      $alumno =  Role::create(['name' => 'Alumno']);

    // Permission::create(['name' => 'lista.admin'])->assignRole($admin);
    //    Permission::create(['name' => 'store.admin'])->assignRole($admin);
    //    Permission::create(['name' => 'update.admin'])->assignRole($admin);
    //    Permission::create(['name' => 'create.admin'])->assignRole($admin);

    //    Permission::create(['name' => 'lista.alumno'])->assignRole($admin);
    //    Permission::create(['name' => 'store.alumno'])->assignRole($admin);
    //    Permission::create(['name' => 'update.alumno'])->assignRole($alumno);
    //    Permission::create(['name' => 'create.alumno'])->assignRole($admin);
    }
}
