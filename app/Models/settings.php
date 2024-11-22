<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $primaryKey = 'id_settings';

    protected $fillable = [
        'id_wedding',
        'cover_photo',
        'background_music',
    ];
    public function wedding()
    {
    return $this->belongsTo(weddings::class, 'id_wedding', 'id_wedding');
    }
}
