<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weddings extends Model
{
    use HasFactory;
    protected $table = 'widdings';
    protected $primaryKey = 'id_wedding';

    protected $fillable = [
        'id_user',
        'title',
        'bride_nama',
        'groom_name',
        'wedding_date',
        'wedding_time',
        'location',
        'message',
        'unique_url'
        
    ];
}
