<?php

namespace Database\Seeders;

use App\Models\Taille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TailleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Taille::create([
            'taille' => 'S',
        ]);

        Taille::create([
            'taille' => 'M',
        ]);

        Taille::create([
            'taille' => 'L',
        ]);

        Taille::create([
            'taille' => 'XL',
        ]);

        Taille::create([
            'taille' => 'XXL',
        ]);
    }
}
