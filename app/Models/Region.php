<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    /**
     * @property int $id
     * @property string $name
     */

    protected $table = 'regions';
    protected $fillable = ['name', 'area_id'];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function city(): HasMany
    {
        return $this->hasMany(Region::class);
    }

    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
