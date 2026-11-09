<?php

namespace App\Models;

use App\Enums\PartOfSpeechCode;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property PartOfSpeechCode $code
 */
class PartOfSpeech extends Model
{
    protected $table = 'parts_of_speech';

    protected $fillable = ['code'];

    protected $casts = [
        'code' => PartOfSpeechCode::class,
    ];

    public $timestamps = false;
}
