<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'id_wedding',
        'name',
        'message'
    ];

    public function weddings()
    {
    return $this->belongsTo(weddings::class, 'id_wedding', 'id_wedding');
    }
}
