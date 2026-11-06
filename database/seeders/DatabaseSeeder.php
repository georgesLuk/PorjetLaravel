<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Il est important d'ajouter le seeder dans le gestionnaire de Seeder nommé DatabaseSeeder.
        //Sinon rien ne s'ajoute!!!
       $this->call(TestSeeder::class);
    }
}
