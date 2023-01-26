<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    //Asocio al modelo
    protected $model = Client::class;
    public function definition()
    {
        
            
            return [
                "DNI"=>$this->faker->bothify("########-?"),
                "nombre"=>$this->faker->firstName(),
                "apellidos"=>$this->faker->lastName(),
                "telefono"=>$this->faker->regexify('[0-9]{9}'),
                "email"=>$this->faker->email(),
            ];
        
    }
}
