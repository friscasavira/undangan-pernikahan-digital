<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $primaryKey = 'id_setting';

    protected $fillable = [
        'id_wedding',
        'cover_photo_url',
        'background_music_url',
        'theme',
        'is_private'
    ];
}
