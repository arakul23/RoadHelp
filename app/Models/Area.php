<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
