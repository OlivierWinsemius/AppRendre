<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GrammarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            UniversalGrammarSeeder::class,
            EnglishGrammarSeeder::class,
            FrenchGrammarSeeder::class,
        ]);
    }
}
