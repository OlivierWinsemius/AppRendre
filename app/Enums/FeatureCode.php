<?php

namespace App\Enums;

use App\Enums\FeatureValueCode\FeatureValueCode;
use App\Enums\FeatureValueCode\GenderValue;
use App\Enums\FeatureValueCode\MoodValue;
use App\Enums\FeatureValueCode\NumberValue;
use App\Enums\FeatureValueCode\PersonValue;
use App\Enums\FeatureValueCode\TenseValue;
use App\Enums\FeatureValueCode\VerbFormValue;

enum FeatureCode: string
{
    // Lexical features: properties of the word itself
    case PronType = 'PronType';   // pronoun type: personal, demonstrative, relative…
    case NumType = 'NumType';     // numeral type: cardinal, ordinal…
    case Poss = 'Poss';           // possessive
    case Reflex = 'Reflex';       // reflexive
    case Foreign = 'Foreign';     // foreign word
    case Abbr = 'Abbr';           // abbreviation
    case Typo = 'Typo';           // misspelling

    // Inflectional features: nominal
    case Gender = 'Gender';
    case Animacy = 'Animacy';
    case NounClass = 'NounClass'; // e.g. Bantu noun classes
    case Number = 'Number';
    case Case = 'Case';
    case Definite = 'Definite';
    case Degree = 'Degree';       // comparative, superlative

    // Inflectional features: verbal
    case VerbForm = 'VerbForm';   // finite, infinitive, participle…
    case Mood = 'Mood';
    case Tense = 'Tense';
    case Aspect = 'Aspect';
    case Voice = 'Voice';
    case Evident = 'Evident';     // evidentiality
    case Polarity = 'Polarity';   // affirmative / negative
    case Person = 'Person';
    case Polite = 'Polite';       // formality
    case Clusivity = 'Clusivity'; // inclusive / exclusive "we"

    /** @return class-string<FeatureValueCode>|null */
    public function valueEnum(): ?string
    {
        return match ($this) {
            self::Gender => GenderValue::class,
            self::Number => NumberValue::class,
            self::Person => PersonValue::class,
            self::Tense => TenseValue::class,
            self::Mood => MoodValue::class,
            self::VerbForm => VerbFormValue::class,
            default => null, // features without a value enum yet
        };
    }
}
