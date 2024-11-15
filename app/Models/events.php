<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'id_wedding',
        'event_name',
        'event_date',
        'event_time',
        'event_location'
    ];
}
