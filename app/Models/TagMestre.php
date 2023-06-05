<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagMestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'hash',
        'status'
    ];

}
