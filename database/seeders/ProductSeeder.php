<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     //   DB::table('products')->truncate(); //
       /* DB::table('products')->insert([
            'nombre' => 'Alicates',
            'descripcion' => 'Alicates molones',
            'precio' => 3.20,
        ]);

        DB::table('products')->insert([
            'nombre' => 'Martillo',
            'descripcion' => 'Martillo molones',
            'precio' => 6.20,
        ]);*/
        Product::factory()->count(23)->create();
    }
}
