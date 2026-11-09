<?php

namespace App\Enums;

enum PartOfSpeechCode: string
{
    case Adjective = 'ADJ';
    case Adposition = 'ADP';
    case Adverb = 'ADV';
    case Auxiliary = 'AUX';
    case CoordinatingConjunction = 'CCONJ';
    case Determiner = 'DET';
    case Interjection = 'INTJ';
    case Noun = 'NOUN';
    case Numeral = 'NUM';
    case Particle = 'PART';
    case Pronoun = 'PRON';
    case ProperNoun = 'PROPN';
    case Punctuation = 'PUNCT';
    case SubordinatingConjunction = 'SCONJ';
    case Symbol = 'SYM';
    case Verb = 'VERB';
    case Other = 'X';
}
