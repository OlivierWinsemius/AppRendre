<?php

namespace App\Enums\FeatureValueCode;

use App\Enums\FeatureCode;
use BackedEnum;

interface FeatureValueCode extends BackedEnum
{
    public function feature(): FeatureCode;
}
