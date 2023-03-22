<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFavoriteAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

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
