<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum TenseValue: string implements FeatureValueCode
{
    case Pres = 'Pres';
    case Past = 'Past';
    case Fut = 'Fut';
    case Imp = 'Imp'; // imperfect: imparfait
    case Pqp = 'Pqp'; // pluperfect

    public function feature(): FeatureCode
    {
        return FeatureCode::Tense;
    }
}
