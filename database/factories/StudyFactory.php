<?php

namespace Database\Factories;

use App\Models\Study;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class StudyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Study::class;
    public function definition()
    {
        return [
            "name"=>$this->faker->word(),
            "code"=>$this->faker->word(),
            "family"=>$this->faker->word(),
            "level"=>$this->faker->word()
        ];
    }
}
