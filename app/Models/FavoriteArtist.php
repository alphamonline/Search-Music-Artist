<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteArtist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'artist_name',
        'image',
        'mbid',
        'url',
        'rank',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
