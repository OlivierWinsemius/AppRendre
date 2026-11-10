<?php

namespace Database\Seeders;

use App\Enums\FeatureCode;
use App\Enums\FeatureRole;
use App\Enums\FeatureValueCode\MoodValue;
use App\Enums\FeatureValueCode\NumberValue;
use App\Enums\FeatureValueCode\PersonValue;
use App\Enums\FeatureValueCode\TenseValue;
use App\Enums\FeatureValueCode\VerbFormValue;
use App\Enums\PartOfSpeechCode;

class EnglishGrammarSeeder extends LanguageGrammarSeeder
{
    protected function languageCode(): string
    {
        return 'en';
    }

    protected function posFeatures(): array
    {
        $inh = FeatureRole::Inherent;
        $infl = FeatureRole::Inflectional;

        return [
            [PartOfSpeechCode::Noun, FeatureCode::Number, $infl],
            [PartOfSpeechCode::ProperNoun, FeatureCode::Number, $inh],

            [PartOfSpeechCode::Verb, FeatureCode::VerbForm, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Mood, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Tense, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Person, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Number, $infl],
        ];
    }

    protected function featureValues(): array
    {
        return [
            NumberValue::Sing, NumberValue::Plur,
            PersonValue::First, PersonValue::Second, PersonValue::Third,
            TenseValue::Pres, TenseValue::Past,
            MoodValue::Ind, MoodValue::Imp,
            VerbFormValue::Fin, VerbFormValue::Inf, VerbFormValue::Part, VerbFormValue::Ger,
        ];
    }
}
