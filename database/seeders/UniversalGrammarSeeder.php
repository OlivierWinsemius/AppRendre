<?php

namespace Database\Seeders;

use App\Enums\FeatureCode;
use App\Enums\PartOfSpeechCode;
use App\Models\Feature;
use App\Models\PartOfSpeech;
use Illuminate\Database\Seeder;

class UniversalGrammarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (PartOfSpeechCode::cases() as $code) {
            PartOfSpeech::query()->firstOrCreate(['code' => $code]);
        }

        foreach (FeatureCode::cases() as $code) {
            $enum = $code->valueEnum();
            if ($enum === null) {
                continue;
            }

            $feature = Feature::query()->firstOrCreate(['code' => $code]);

            foreach ($enum::cases() as $value) {
                $feature->values()->firstOrCreate(['code' => $value]);
            }
        }
    }
}
