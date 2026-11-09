<?php

namespace App\Models;

use App\Enums\LanguageCode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property LanguageCode $code e.g. "en" or "fr"
 */
class Language extends Model
{
    protected $fillable = ['code'];

    protected $casts = [
        'code' => LanguageCode::class,
    ];

    public $timestamps = false;

    /**
     * @return HasMany<LanguagePosFeature, $this>
     */
    public function posFeatures(): HasMany
    {
        return $this->hasMany(LanguagePosFeature::class);
    }

    /**
     * @return Collection<int, LanguagePosFeature>
     */
    public function featuresFor(PartOfSpeech $pos): Collection
    {
        return $this->posFeatures()
            ->where('part_of_speech_id', $pos->id)
            ->with('feature')
            ->get();
    }

    /**
     * @return BelongsToMany<FeatureValue, $this>
     */
    public function featureValues(): BelongsToMany
    {
        return $this->belongsToMany(FeatureValue::class, 'language_feature_values')
            ->orderByPivot('display_order');
    }
}
