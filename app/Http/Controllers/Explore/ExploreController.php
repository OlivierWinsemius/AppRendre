<?php

namespace App\Http\Controllers\Explore;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ExploreController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('explore/index');
    }
}
