<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cemetery extends Model
{
    use HasFactory;
    protected $table = 'cemetery';

    protected $fillable = [
        'cemetery_no',
        'status',
        'created_by'
    ];
}
