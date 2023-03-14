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
            'taille' => '6/8 ans',
        ]);

        Taille::create([
            'taille' => '9/11 ans',
        ]);

        Taille::create([
            'taille' => '12/14 ans',
        ]);

        Taille::create([
            'taille' => '36',
        ]);

        Taille::create([
            'taille' => '38',
        ]);

        Taille::create([
            'taille' => '40',
        ]);

        Taille::create([
            'taille' => '42',
        ]);

        Taille::create([
            'taille' => '44',
        ]);

        Taille::create([
            'taille' => '46',
        ]);

        Taille::create([
            'taille' => 'XS',
        ]);

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

        Taille::create([
            'taille' => '3XL',
        ]);

        Taille::create([
            'taille' => '4XL',
        ]);

        Taille::create([
            'taille' => '5XL',
        ]);

        Taille::create([
            'taille' => 'Taille unique',
        ]);
    }
}
