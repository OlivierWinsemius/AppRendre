<?php

namespace App\Http\Controllers\Explore;

use App\Enums\LanguageCode;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Inertia\Inertia;
use Inertia\Response;

class LanguageController extends Controller
{
    public function index(): Response
    {
        $languages = Language::query()->pluck('code');

        return Inertia::render('explore/languages/index', ['languages' => $languages]);
    }

    public function showLanguage(LanguageCode $languageCode): Response
    {
        $language = Language::query()->where('code', $languageCode)->firstOrFail();

        return Inertia::render('explore/languages/language', ['language' => $language]);
    }
}
