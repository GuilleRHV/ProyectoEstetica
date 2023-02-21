<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos un admin por defecto para poder acceder a la aplicacion
        $admin = new Admin([
            "nombre" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make("12345678"),
            "puesto"=>"gerente"
        ]);

        $admin->save();
  
    }
}
