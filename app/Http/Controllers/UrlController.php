<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortUrlRequest;
use Illuminate\Support\Str;

class UrlController extends Controller {

  /**
   * Encodes a URL to a shortened URL
   * @param ShortUrlRequest $request
   * @return JsonResponse
   */
  public function encode(ShortUrlRequest $request) {
    // Get the long URL from the form
    $longUrl = $request->url;
    // Generate a short code (6 characters)
    $shortCode = $this->generateShortCode();
    // Save the long URL and short code mapping to a file
    $this->saveUrlMapping($shortCode, $longUrl);
    // Return the short URL to the user
    $shortUrl = url($shortCode);
    return ['shortUrl' => $shortUrl];
  }

  /**
   * Decodes a shortened URL to its original URL
   * @param ShortUrlRequest $request
   * @return JsonResponse
   */
  public function decode(ShortUrlRequest $request) {
    $shortCode = last(explode('/', $request->url));
    // Read and decode the mappings
    $urlMappings = session('urls');
    // Return the long URL if it exists
    return ['originalUrl' => $urlMappings[$shortCode] ?? null];
  }

  /**
   * Helper method to save the URL mapping in a session
   * @param $shortCode
   * @param $longUrl
   */
  private function saveUrlMapping($shortCode, $longUrl) {
    session()->put('urls', [$shortCode => $longUrl]);
  }

  /**
   * Helper method to generate a 6-character short code
   * @return string
   */
  private function generateShortCode() {
    return Str::random(6);  // Generate a random 6-character alphanumeric string
  }
}
