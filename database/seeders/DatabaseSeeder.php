<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;  // <-- Importar Role
use App\Models\User;                // <-- Importar User
use App\Models\Program;             // <-- Importar Program
use App\Models\Course;              // <-- Importar Course
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
     public function run()
    {
   // Crear roles
    Role::create(['name' => 'Administrador']);
    Role::create(['name' => 'Coordinador']);
    Role::create(['name' => 'Vicerrector']);

    // Crear usuario admin
    $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('password'),
    ]);
    $admin->assignRole('Administrador');

    // Crear programas y cursos
    Program::create(['name' => 'Ingeniería de Software', 'duration' => 10]);
    Course::create(['name' => 'Programación I', 'program_id' => 1, 'semester' => 1]);
 }
}

