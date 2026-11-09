<?php

use App\Models\Feature;
use App\Models\Language;
use App\Models\PartOfSpeech;
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
        Schema::create('language_pos_features', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Language::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(PartOfSpeech::class)->constrained()->restrictOnDelete();
            $table->foreignIdFor(Feature::class)->constrained()->restrictOnDelete();
            $table->string('role');
            $table->unique(['language_id', 'part_of_speech_id', 'feature_id'], 'language_pos_features_unique');
            $table->index('part_of_speech_id');
            $table->index('feature_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_pos_features');
    }
};
