<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weddings extends Model
{
    use HasFactory;
    protected $table = 'weddings';
    protected $primaryKey = 'id_wedding';

    protected $fillable = [
        'id_user',
        'title',
        'bride_name',
        'groom_name',
        'wedding_date',
        'wedding_time',
        'location',
        'message',
        'unique_url'

    ];

    public function events()
    {
        return $this->hasMany(events::class, 'id_event', 'id_event');
    }
}
