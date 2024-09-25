<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Categeory;
use App\Models\Pencipta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([CategeorySeeder::class, PenciptaSeeder::class]);
        Admin::factory(100)->recycle([Categeory::all(), Pencipta::all()])->create();
    }
}
