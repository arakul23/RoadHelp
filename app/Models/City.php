<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'area_id', 'region_id'];

    public function areas()
    {
        return $this->belongsTo(Area::class);
    }
    public function regions()
    {
        return $this->belongsTo(Region::class);
    }
}
