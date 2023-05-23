<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('12345678'),
                'address' =>'fayum City',
                'phone' => '01010101010',
        ];
    }
}
