<?php

namespace App\Http\Controllers\Api\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Str;

class RedirectController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'link' => 'url'
        ]);

        $link = Link::create([
            'short' => Str::random(5),
            'full'  => $request->get('link')
        ]);
        return response()->json([
            'link' => url($link->short)
        ]);
    }
}
