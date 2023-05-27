<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string name
 */

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
