<?php

namespace Database\Seeders;

use App\Enums\FeatureCode;
use App\Enums\FeatureRole;
use App\Enums\FeatureValueCode\GenderValue;
use App\Enums\FeatureValueCode\MoodValue;
use App\Enums\FeatureValueCode\NumberValue;
use App\Enums\FeatureValueCode\PersonValue;
use App\Enums\FeatureValueCode\TenseValue;
use App\Enums\FeatureValueCode\VerbFormValue;
use App\Enums\PartOfSpeechCode;

class FrenchGrammarSeeder extends LanguageGrammarSeeder
{
    protected function languageCode(): string
    {
        return 'fr';
    }

    protected function posFeatures(): array
    {
        $inh = FeatureRole::Inherent;
        $infl = FeatureRole::Inflectional;

        return [
            [PartOfSpeechCode::Noun, FeatureCode::Gender, $inh],
            [PartOfSpeechCode::Noun, FeatureCode::Number, $infl],

            [PartOfSpeechCode::ProperNoun, FeatureCode::Gender, $inh],  // la France
            [PartOfSpeechCode::ProperNoun, FeatureCode::Number, $inh],  // les Pays-Bas

            [PartOfSpeechCode::Adjective, FeatureCode::Gender, $infl],  // petit / petite
            [PartOfSpeechCode::Adjective, FeatureCode::Number, $infl],

            [PartOfSpeechCode::Verb, FeatureCode::VerbForm, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Mood, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Tense, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Person, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Number, $infl],
            [PartOfSpeechCode::Verb, FeatureCode::Gender, $infl],      // participles: allé / allée
        ];
    }

    protected function featureValues(): array
    {
        return [
            GenderValue::Masc, GenderValue::Fem,
            NumberValue::Sing, NumberValue::Plur,
            PersonValue::First, PersonValue::Second, PersonValue::Third,
            TenseValue::Pres, TenseValue::Imp, TenseValue::Fut, TenseValue::Past,
            MoodValue::Ind, MoodValue::Cnd, MoodValue::Sub, MoodValue::Imp,
            VerbFormValue::Fin, VerbFormValue::Inf, VerbFormValue::Part,
        ];
    }
}
