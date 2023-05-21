<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area_id', 'region_id'];

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function company(): HasMany
    {
        return $this->hasMany(Company::class);
    }
}
