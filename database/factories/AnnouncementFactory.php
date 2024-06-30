<?php

namespace Database\Factories;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(2),
            'body' => fake()->paragraph(1),
            'price' => random_int(1, 1000),
            'user_id' => random_int(1, User::count()),
            'category_id' => random_int(1, 10),
            'is_accepted' => random_int(0, 1) ? 1 : null,
            'created_at'=>fake()->dateTime( 'now',  'Europe/Rome'),

        ];
    }
}
