<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFavoriteArtistRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'exists:users,id',
            'artist_name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'mbid' => 'nullable|string',
            'url' => 'nullable|string',
            'rank' => 'nullable|string',
        ];
    }
}
