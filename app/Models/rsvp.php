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
        'id_guest',
        'message',
        'attendance_status',
        'total_guest'
        
    ];
}
