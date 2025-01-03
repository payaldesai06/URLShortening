<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortUrlRequest extends FormRequest {
  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(): array {
    return [
      'url' => 'required|string|min:3',
    ];
  }
}
