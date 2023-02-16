<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TailleArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tailles_articles')->insert([
            'taille_id' => 1,
            'article_id' => 1,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 2,
            'article_id' => 2,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 3,
            'article_id' => 3,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 4,
            'article_id' => 4,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 5,
            'article_id' => 5,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 1,
            'article_id' => 6,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 2,
            'article_id' => 7,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 3,
            'article_id' => 8,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 4,
            'article_id' => 9,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 5,
            'article_id' => 10,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 1,
            'article_id' => 11,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 2,
            'article_id' => 12,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 3,
            'article_id' => 13,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 4,
            'article_id' => 14,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 5,
            'article_id' => 15,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 1,
            'article_id' => 16,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 2,
            'article_id' => 17,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 3,
            'article_id' => 18,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 4,
            'article_id' => 19,
        ]);

        DB::table('tailles_articles')->insert([
            'taille_id' => 5,
            'article_id' => 20,
        ]);
    }
}
