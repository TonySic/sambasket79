<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdresseSeeder::class,
            TailleSeeder::class,
            ArticleSeeder::class,
            TailleArticleSeeder::class,
            CommandeSeeder::class,
            CommandeArticleSeeder::class,
        ]);
    }
}
