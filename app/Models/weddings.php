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
    return $this->hasMany(events::class, 'id_wedding', 'id_wedding');
    }

    public function comments()
    {
    return $this->hasMany(comments::class, 'id_wedding', 'id_wedding');
    }
<<<<<<< HEAD

    public function rsvp()
    {
    return $this->hasOne(rsvp::class, 'id_wedding', 'id_wedding');
    }

=======
    public function photos()
    {
    return $this->hasMany(photos::class, 'id_wedding', 'id_wedding');
    }
>>>>>>> 1db6e1ccb6bbaaf28f19b62b7238803221838536
    public function love_story()
    {
    return $this->hasMany(love_story::class, 'id_wedding', 'id_wedding');
    }
<<<<<<< HEAD
=======
    public function setting()
    {
    return $this->hasMany(settings::class, 'id_wedding', 'id_wedding');
    }


>>>>>>> 1db6e1ccb6bbaaf28f19b62b7238803221838536
}
