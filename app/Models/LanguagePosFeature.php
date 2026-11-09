<?php

namespace App\Models;

use App\Enums\FeatureRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $language_id
 * @property int $part_of_speech_id
 * @property int $feature_id
 * @property FeatureRole $role
 */
class LanguagePosFeature extends Model
{
    protected $fillable = [
        'language_id',
        'part_of_speech_id',
        'feature_id',
        'role',
    ];

    protected $casts = [
        'role' => FeatureRole::class,
    ];

    public $timestamps = false;

    /**
     * @return BelongsTo<Language, $this>
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * @return BelongsTo<PartOfSpeech, $this>
     */
    public function partOfSpeech(): BelongsTo
    {
        return $this->belongsTo(PartOfSpeech::class);
    }

    /**
     * @return BelongsTo<Feature, $this>
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
