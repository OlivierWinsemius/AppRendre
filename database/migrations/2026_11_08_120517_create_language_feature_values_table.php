<?php

use App\Models\FeatureValue;
use App\Models\Language;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('language_feature_values', function (Blueprint $table) {
            $table->foreignIdFor(Language::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(FeatureValue::class)->constrained()->restrictOnDelete();
            $table->unsignedSmallInteger('display_order')->default(0);
            $table->primary(['language_id', 'feature_value_id']);
            $table->index('feature_value_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_feature_values');
    }
};
