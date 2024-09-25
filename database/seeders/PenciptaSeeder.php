<?php

namespace Database\Seeders;

use App\Models\Pencipta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenciptaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pencipta::factory(8)->create();
    }
}
