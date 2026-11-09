<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;

enum PersonValue: string implements FeatureValueCode
{
    case First = '1';
    case Second = '2';
    case Third = '3';

    public function feature(): FeatureCode
    {
        return FeatureCode::Person;
    }
}
