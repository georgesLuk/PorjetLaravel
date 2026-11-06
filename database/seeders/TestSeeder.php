<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tests')->insert([
            [
                'id' => 1,
                'nom' => 'Canadiens de Montréal',
                'description' => 'Une équipe du tonnere',
                'qt' => 100,
                'prix' => 3.14159,
                'actif' => true,
            ],

            [
                'id' => 2,
                'nom' => 'Bruins de Boston',
                'description' => 'Une équipe du tonnere',
                'qt' => 100,
                'prix' => 3.14159,
                'actif' => true,
            ],


        ]);
    }
}
