<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array

    {
        static $number = 1;

        return [
            'title' => fake()->randomElement(['Помидоры', 'Огурцы', 'Кабачки', 'Морковь', 'Свёкла']),
            'price' => random_int(100, 1000),
            'color' => fake()->randomElement(['Синий', 'Зеленый', 'Красный', 'Жёлтый', 'Чёрный', 'Белый']),
            'variety' => fake()->randomElement(['Ранний', 'Поздний', 'Сладкий', 'Кислый', 'Пятый']),
            'category_id' => random_int(1, 3)
        ];
    }
}
