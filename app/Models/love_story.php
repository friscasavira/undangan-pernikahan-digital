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
        'date_story',
        'tittle_story',
        'description_story'
    ];

    public function wedding()
    {
    return $this->belongsTo(weddings::class, 'id_wedding', 'id_wedding');
    }
}
