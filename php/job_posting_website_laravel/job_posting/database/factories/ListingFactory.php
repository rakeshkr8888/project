<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>$this->faker->sentence(),
            "company"=>$this->faker->company(),
            "location"=>$this->faker->city(),
            "website"=>$this->faker->url(),
            "email"=>$this->faker->companyEmail(),
            "tag"=>"laravel,api,php,python",
            "description"=>$this->faker->paragraph(6),
        ];
    }
}
