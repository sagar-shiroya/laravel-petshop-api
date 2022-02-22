<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $file = $this->faker->image(public_path().'/petshop', 400, 400, null, false);
        $file_path = public_path() . "/petshop/$file";
        return [
            'uuid' => Str::uuid(),
            'name' => basename($file_path),
            'path' => 'public/petshop/' . basename($file_path),
            'size' => filesize($file_path),
            'type' => File::mimeType($file_path)
        ];
    }
}
