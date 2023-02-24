<?php

namespace Database\Seeders;

use App\Models\CentroEstetica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CentroEsteticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos un admin por defecto para poder acceder a la aplicacion
        $admin = new CentroEstetica([
            "nombre" => "Estetica LU ",
            "razonsocial" => "Esteticalu",
            "direccion" => "Avda Salvador 189",
            "telefono"=>"32423434",
            "email"=>"esteticalup@gmail.com",
            "unisex"=>true,
            "capacidadmax"=>"10"
        ]);

        $admin->save();
  
    }
}
