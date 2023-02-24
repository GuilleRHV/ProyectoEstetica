<?php

namespace Database\Seeders;

use App\Models\Peluqueria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeluqueriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Peluqueria([
            "nombre" => "Corte Sara ",
            "razonsocial" => "CorteSaraSL",
            "direccion" => "Avda numancia 19",
            "telefono"=>"566464",
            "email"=>"cortsa@gmail.com",
            'nsalas'=>5,
            'fisioterapia'=>"2"
            
        ]);
        $admin->save();
    }
}
