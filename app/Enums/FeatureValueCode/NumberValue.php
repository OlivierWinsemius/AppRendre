<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum NumberValue: string implements FeatureValueCode
{
    case Sing = 'Sing';
    case Plur = 'Plur';
    case Dual = 'Dual';
    case Ptan = 'Ptan'; // plurale tantum: les lunettes, les vacances
    case Coll = 'Coll'; // collective

    public function feature(): FeatureCode
    {
        return FeatureCode::Number;
    }
}
