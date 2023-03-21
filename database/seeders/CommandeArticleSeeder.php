<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<21; $i++) {
            DB::table('commandes_articles')->insert([
                'article_id' => rand(1, 15),
                'commande_id' => $i,
                'quantite' => rand(1, 20),
                'initiales' => null,
                'numero' => rand(0, 99),
                'flocage' => fake()->firstName(),
                'prix' => floatval(rand(10, 35)),
                'taille' => 'XS'
            ]);
        }
        
    }
}
