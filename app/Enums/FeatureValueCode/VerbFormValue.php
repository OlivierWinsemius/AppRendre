<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum VerbFormValue: string implements FeatureValueCode
{
    case Fin = 'Fin';   // finite: suis, allons
    case Inf = 'Inf';   // infinitive: être
    case Part = 'Part'; // participle: été, allé
    case Ger = 'Ger';   // gerund

    public function feature(): FeatureCode
    {
        return FeatureCode::VerbForm;
    }
}
