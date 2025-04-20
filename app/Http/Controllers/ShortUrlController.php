<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    #logic
    
    public function store(Request $request)
    {

        $request->validate(['url' => 'required|url']);
        $shortCode = Str::random(6);

        $shortUrl = ShortUrl::create([
            'url' => $request->url,
            'short_code' => $shortCode,
        ]);
        if (!$shortUrl)return response()->json(['message' => 'Bad Request'], 400);

        return response()->json($shortUrl, 201);
    }

    public function show($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->first();
        if (!$shortUrl) return response()->json(['message' => 'Not Found'], 404);

        $shortUrl->increment('access_count');

        return response()->json($shortUrl);
    }

    public function update(Request $request, $shortCode)
    {
        $request->validate(['url' => 'required|url']);
        $shortUrl = ShortUrl::where('short_code', $shortCode)->first();
        if (!$shortUrl) return response()->json(['message' => 'Not Found'], 404);

        $shortUrl->update(['url' => $request->url]);

        return response()->json($shortUrl);
    }

    public function destroy($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->first();
        if (!$shortUrl) return response()->json(['message' => 'Not Found'], 404);

        $shortUrl->delete();

        return response()->noContent();
    }

    public function stats($shortCode)
    {
        $shortUrl = ShortUrl::where('short_code', $shortCode)->first();
        if (!$shortUrl) return response()->json(['message' => 'Not Found'], 404);

        return response()->json($shortUrl);
    }
}
