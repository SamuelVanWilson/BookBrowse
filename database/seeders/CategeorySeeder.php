<?php

namespace Database\Seeders;


use App\Models\Categeory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategeorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categeory::create([
            'nama' => 'Fiksi'
        ]);
        Categeory::create([
            'nama' => 'Non-Fiksi'
        ]);
        Categeory::create([
            'nama' => 'Biografi'
        ]);
        Categeory::create([
            'nama' => 'Sejarah'
        ]);
        Categeory::create([
            'nama' => 'Sains'
        ]);
        Categeory::create([
            'nama' => 'Psikologi'
        ]);
        Categeory::create([
            'nama' => 'Pendidikan'
        ]);
        Categeory::create([
            'nama' => 'Agama dan Spiritualitas'
        ]);
        Categeory::create([
            'nama' => 'Kesehatan dan Kebugaran'
        ]);
        Categeory::create([
            'nama' => 'Pengembangan Diri'
        ]);
        Categeory::create([
            'nama' => 'Seni dan Desain'
        ]);
        Categeory::create([
            'nama' => 'Teknologi dan Komputer'
        ]);
        Categeory::create([
            'nama' => 'Politik dan Pemerintahan'
        ]);
        Categeory::create([
            'nama' => 'Bisnis dan Ekonomi'
        ]);
        Categeory::create([
            'nama' => 'Sastra'
        ]);
    }
}
