<?php

namespace App\Http\Controllers\Explore;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Inertia\Inertia;
use Inertia\Response;

class ExploreController extends Controller
{
    public function index(): Response
    {
        $languages = Language::query()->pluck('code');

        return Inertia::render('explore/index', ['languages' => $languages]);
    }
}
