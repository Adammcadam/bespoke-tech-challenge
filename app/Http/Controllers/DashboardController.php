<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        // TODO:: bug should bring through latest items not oldest
        return Inertia::render('Dashboard', [
            'items' => Item::oldest()->search(request(['search', 'content_type']))->limit(10)->get(),
            'currentType' => request('category') ?? '',
            'currentSearch' => request('search') ?? ''
        ]);
    }
}
