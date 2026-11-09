<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum MoodValue: string implements FeatureValueCode
{
    case Ind = 'Ind'; // indicative
    case Sub = 'Sub'; // subjunctive
    case Cnd = 'Cnd'; // conditional
    case Imp = 'Imp'; // imperative

    public function feature(): FeatureCode
    {
        return FeatureCode::Mood;
    }
}
