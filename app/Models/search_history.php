<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class search_history extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_search'
    ];
}
