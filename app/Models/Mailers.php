<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailers extends Model
{
    use HasFactory;

    protected $table = 'mailers';

    protected $fillable = [
        'title',
        'content',
        'file',
    ];
}
