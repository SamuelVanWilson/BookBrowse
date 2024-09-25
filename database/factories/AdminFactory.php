<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Categeory;
use App\Models\Pencipta;
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
            'judul' => fake()->unique()->word(2),
            'pencipta_id' => Pencipta::factory(),
            'nama_penerbit' => fake()->word(),
            'tahun_terbit' => fake()->year(),
            'kategori_id' => Categeory::factory(),
            'sinopsis' => fake()->paragraph(4),
        ];
    }
}
