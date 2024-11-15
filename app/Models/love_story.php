<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class love_story extends Model
{
    use HasFactory;
    protected $table = 'love_story';
    protected $primaryKey = 'id_story';

    protected $fillable = [
        'id_wedding',
        'photo_url',
        'date',
        'tittle_story',
        'description'
    ];
}
