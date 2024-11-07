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
}
