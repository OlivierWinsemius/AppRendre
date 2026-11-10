<?php

namespace Database\Seeders;

use App\Enums\FeatureCode;
use App\Enums\FeatureRole;
use App\Enums\FeatureValueCode\FeatureValueCode;
use App\Enums\PartOfSpeechCode;
use App\Models\Feature;
use App\Models\FeatureValue;
use App\Models\Language;
use App\Models\LanguagePosFeature;
use App\Models\PartOfSpeech;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

abstract class LanguageGrammarSeeder extends Seeder
{
    abstract protected function languageCode(): string;

    /** @return list<array{PartOfSpeechCode, FeatureCode, FeatureRole}> */
    abstract protected function posFeatures(): array;

    /** @return list<FeatureValueCode> in display order */
    abstract protected function featureValues(): array;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $language = Language::query()->firstOrCreate(['code' => $this->languageCode()]);

            foreach ($this->posFeatures() as [$pos, $feature, $role]) {
                LanguagePosFeature::query()->updateOrCreate(
                    [
                        'language_id' => $language->id,
                        'part_of_speech_id' => PartOfSpeech::for($pos)->id,
                        'feature_id' => Feature::for($feature)->id,
                    ],
                    ['role' => $role]);
            }

            $order = []; // counter per feature, so each feature starts at 10
            $pivot = [];
            foreach ($this->featureValues() as $value) {
                $key = $value->feature()->value;
                $order[$key] = ($order[$key] ?? 0) + 10;
                $pivot[FeatureValue::for($value)->id] = ['display_order' => $order[$key]];
            }

            $language->featureValues()->syncWithoutDetaching($pivot);
        });
    }
}
