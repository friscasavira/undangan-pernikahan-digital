<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rsvp extends Model
{
    use HasFactory;
    protected $table = 'rsvp';
    protected $primaryKey = 'id_rsvp';

    protected $fillable = [
        'id_wedding',
        'name',
        'email',
        'phone',
        'message',
        'is_invited',
        'attendance_status',
        'total_guest'
        
    ];

    public function guests()
    {
    return $this->belongsTo(weddings::class, 'id_wedding', 'id_wedding');
    }
}
