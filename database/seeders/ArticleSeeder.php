<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'nom' => 'Tee-shirt Ice-T Junior',
            'description' => 'Disponible en trois tailles : 6/8 ans, 9/11 ans et 12/14 ans',
            'image' => 't-shirt-junior.png',
            'prix' => 14,
            'flocage' => true,
            'numero' => true,
        ]);

        Article::create([
            'nom' => 'Tee-shirt Ice-T Femme',
            'description' => 'Disponible du 36 au 44',
            'image' => 't-shirt-femme.png',
            'prix' => 16,
            'flocage' => true,
            'numero' => true,
        ]);

        Article::create([
            'nom' => 'Tee-shirt Ice-T Homme',
            'description' => 'Disponible du S au XXL',
            'image' => 't-shirt-homme.png',
            'prix' => 16,
            'flocage' => true,
            'numero' => true,
        ]);

        Article::create([
            'nom' => 'Pantalon Molleton Junior',
            'description' => 'Disponible en trois tailles : 6/8 ans, 9/11 ans et 12/14 ans',
            'image' => 'pantalon-adulte.png',
            'prix' => 24,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Pantalon Molleton Adulte',
            'description' => 'Disponible du XS au 4XL',
            'image' => 'pantalon-adulte.png',
            'prix' => 28,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Veste zippee Junior',
            'description' => 'Disponible en trois tailles : 6/8 ans, 9/11 ans et 12/14 ans',
            'image' => 'veste-zippee-homme.png',
            'prix' => 29,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Veste zippee Femme',
            'description' => 'Disponible du 36 au 44',
            'image' => 'veste-zippee-femme.png',
            'prix' => 33,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Veste zippee Homme',
            'description' => 'Disponible du S au 5XL',
            'image' => 'veste-zippee-homme.png',
            'prix' => 33,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Sweat a capuche Junior',
            'description' => 'Disponible en trois tailles : 6/8 ans, 9/11 ans et 12/14 ans',
            'image' => 'sweat-capuche-junior.png',
            'prix' => 26,
            'flocage' => true,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Sweat a capuche Adulte',
            'description' => 'Disponible du XS au 4XL',
            'image' => 'sweat-capuche-adulte.png',
            'prix' => 29,
            'flocage' => true,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Short Active Junior',
            'description' => 'Disponible en trois tailles : 6/8 ans, 9/11 ans et 12/14 ans',
            'image' => 'short-active.png',
            'prix' => 15,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Short Active Adulte',
            'description' => 'Disponible du XS au 4XL',
            'image' => 'short-active.png',
            'prix' => 16,
            'flocage' => false,
            'numero' => false,
        ]);


        Article::create([
            'nom' => 'Polo Marion Femme',
            'description' => 'Disponible du 36 au 46',
            'image' => 'polo-femme.png',
            'prix' => 21,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Polo Lincoln Homme',
            'description' => 'Disponible du S au 4XL',
            'image' => 'polo-homme.png',
            'prix' => 21,
            'flocage' => false,
            'numero' => false,
        ]);

        Article::create([
            'nom' => 'Sac de sport',
            'description' => '54x30x27 cm',
            'image' => 'sac.png',
            'prix' => 29,
            'flocage' => false,
            'numero' => false,
        ]);
    }
}
