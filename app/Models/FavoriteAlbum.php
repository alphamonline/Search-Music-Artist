<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'album_name',
        'artist_name',
        'image',
        'album_url',
        'artist_url',
        'rank',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
