<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Story::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $type =  $this->faker->randomElement(['short', 'long']);
        if ($type == 'long') {
            $body = $this->faker->paragraph();
        } else {
            $body = $this->faker->text(200);
        }

        return [
            // 'user_id' => $this->faker->numberBetween(1, 2),
            'user_id' => User::factory(),
            'title' => $this->faker->unique()->lexify('??????????'),
            'body' => $body,
            'type' => $type,
            'status' => $this->faker->boolean(),
        ];
    }
}
