<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFavoriteAlbumRequest extends FormRequest
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
            'album_name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'album_url' => 'nullable|string',
            'artist_name' => 'nullable|string',
            'artist_url' => 'nullable|string',
            'rank' => 'nullable|string',
        ];
    }
}
