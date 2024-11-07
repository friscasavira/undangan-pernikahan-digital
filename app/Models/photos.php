<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photos extends Model
{
    use HasFactory;
    protected $table = 'photos';
    protected $primaryKey = 'id_photo';

    protected $fillable = [
        'id_wedding',
        'photo_url',
        'caption'
    ];
}
