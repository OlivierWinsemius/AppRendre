<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum GenderValue: string implements FeatureValueCode
{
    case Masc = 'Masc';
    case Fem = 'Fem';
    case Neut = 'Neut';
    case Com = 'Com';

    public function feature(): FeatureCode
    {
        return FeatureCode::Gender;
    }
}
