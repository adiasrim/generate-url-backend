<?php

namespace App\Http\Controllers\Api\Links;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    /**
     * @param Request $request
     * @param $slug
     * @return RedirectResponse
     */
    public function __invoke(Request $request, $slug): RedirectResponse
    {
        $link = Link::whereShort($slug)->firstOrFail();

        return Redirect::to($link->full);
    }
}
