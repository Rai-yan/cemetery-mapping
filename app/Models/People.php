<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $table = 'peoples';

    protected $fillable = [
        'cemetery_no',
        'first_name',
        'last_name',
        'user_image',
        'grave_no',
        'born_date',
        'die_date',
        'block_no'
    ];
}
