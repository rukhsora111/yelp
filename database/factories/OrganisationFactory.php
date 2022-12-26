<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organisation>
 */
class OrganisationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'legal_name'=> fake()->unique()->text(),
            'description'=> fake()->unique()->text(),
            'source'=> fake()->unique()->text(),
            'inn'=> fake()->unique()->text(),
            'location'=> fake()->unique()->text(),
            'head_person_name'=> fake()->unique()->text(),
            
        ];
    }
}
