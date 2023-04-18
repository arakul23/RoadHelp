<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * @property int $id
     * @property string $name
     */

    protected $table = 'regions';
    protected $fillable = ['name'];
}
