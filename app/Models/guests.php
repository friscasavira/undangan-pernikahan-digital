<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guests extends Model
{
    use HasFactory;
    protected $table = 'guests';
    protected $primaryKey = 'id_guest';

    protected $fillable = [
        'id_wedding',
        'name',
        'email',
        'phone',
        'is_invited',
        'attendence_status'
    ];
}
