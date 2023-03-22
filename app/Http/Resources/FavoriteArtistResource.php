<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class FavoriteArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var User $user */
        $user = Auth::user();

        return [
            'id' => $this->id,
            'user_id' => $user->id,
            'artist_name' => $this->artist_name,
            'image' => $this->image,
            'mbid' => $this->mbid,
            'url' => $this->url,
            'rank' => $this->rank,
        ];
    }
}