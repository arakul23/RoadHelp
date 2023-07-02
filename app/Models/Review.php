<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string author_name
 * @property string text
 */
class Review extends Model
{
    protected $fillable = ['name', 'text'];

    use HasFactory;
}
