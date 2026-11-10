<?php

namespace App\Models;

use App\Enums\FeatureValueCode\FeatureValueCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $feature_id
 * @property string $code
 */
class FeatureValue extends Model
{
    protected $fillable = ['code'];

    public $timestamps = false;

    /**
     * @return BelongsTo<Feature, $this>
     */
    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public static function for(FeatureValueCode $code): self
    {
        return static::query()
            ->whereRelation('feature', 'code', $code->feature())
            ->where('code', $code->value)
            ->firstOrFail();
    }
}
