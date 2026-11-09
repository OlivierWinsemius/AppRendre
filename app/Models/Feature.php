<?php

namespace App\Models;

use App\Enums\FeatureCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property FeatureCode $code
 */
class Feature extends Model
{
    protected $fillable = ['code'];

    protected $casts = [
        'code' => FeatureCode::class,
    ];

    public $timestamps = false;

    /**
     * @return HasMany<FeatureValue, $this>
     */
    public function values(): HasMany
    {
        return $this->hasMany(FeatureValue::class);
    }
}
