<?php

namespace App\Enums;

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
}
