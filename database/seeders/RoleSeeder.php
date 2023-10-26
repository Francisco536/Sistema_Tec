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




       Permission::create(['name' => 'lista.admin'])->assignRole($admin);
       Permission::create(['name' => 'store.admin'])->assignRole($admin);
       Permission::create(['name' => 'update.admin'])->assignRole($admin);
       Permission::create(['name' => 'add.admin'])->assignRole($admin);
       Permission::create(['name' => 'ver.admin'])->assignRole($admin);

       Permission::create(['name' => 'lista.alumno'])->assignRole($admin);
       Permission::create(['name' => 'add.alumno'])->assignRole($admin);
       Permission::create(['name' => 'store.alumno'])->assignRole($admin);
       Permission::create(['name' => 'update.alumno'])->assignRole($alumno);
       Permission::create(['name' => 'lista.alumnoAgro'])->assignRole($admin);
       Permission::create(['name' => 'lista.alumnoGes'])->assignRole($admin);
       Permission::create(['name' => 'lista.alumnoSis'])->assignRole($admin);
       Permission::create(['name' => 'lista.documentos'])->assignRole($admin);
       Permission::create(['name' => 'lista.documentosCom'])->assignRole($admin);
       Permission::create(['name' => 'lista.documentosInc'])->assignRole($admin);
       Permission::create(['name' => 'lista.documentosVacio'])->assignRole($admin);
       Permission::create(['name' => 'add.documento'])->assignRole($alumno);

    }
}
