<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // création de l'administrateur
        User::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('Azerty1234'),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        // création de l'administrateur
        User::create([
            'nom' => 'user',
            'prenom' => 'user',
            'email' => 'user@user.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('Azerty1234'),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        // création de 28 users aléatoire
        User::factory(28)->create();
    }
}
