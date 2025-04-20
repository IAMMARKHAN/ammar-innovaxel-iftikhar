<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = ['url', 'short_code', 'access_count'];
    use HasFactory;
}
