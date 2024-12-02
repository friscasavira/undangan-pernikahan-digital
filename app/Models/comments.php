<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id_comments';

    protected $fillable = [
        'id_wedding',
        'name_tamu',
        'message'
    ];

    public function wedding()
    {
    return $this->belongsTo(weddings::class, 'id_wedding', 'id_wedding');
    }
}
