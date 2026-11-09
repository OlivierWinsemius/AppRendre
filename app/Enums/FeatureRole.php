<?php

// app/Enums/FeatureRole.php

namespace App\Enums;

enum FeatureRole: string
{
    case Inherent = 'inherent';         // fixed per lexeme: noun gender
    case Inflectional = 'inflectional'; // varies per form: verb tense
}
