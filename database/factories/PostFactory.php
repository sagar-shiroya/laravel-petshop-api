<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(30);
        $file = File::all()->random(1)->first();

        return [
            'uuid' => Str::uuid(),
            'title' => $title,
            'slug' => Str::slug($title,'-'),
            'content' => $this->faker->paragraph(10),
            'metadata' => json_encode([
                "author" => $this->faker->name(),
                "image" => $file->uuid
                ])
        ];
    }
}
