<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Composer;

class Area extends Model
{
    /**
     * @property int $id
     * @property string $name
     */

    protected $table = 'areas';
    protected $fillable = ['name'];

    public function regions(): HasMany
    {
        return $this->hasMany(Region::class);
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
