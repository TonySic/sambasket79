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
            AdresseSeeder::class,
            ArticleSeeder::class,
            CommandeArticleSeeder::class,
            CommandeSeeder::class,
            RoleSeeder::class,
            TailleArticleSeeder::class,
            TailleSeeder::class,
            UserSeeder::class
        ]);
    }
}
