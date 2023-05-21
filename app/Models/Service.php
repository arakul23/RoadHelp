<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['name'];
    public function company(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_service')
            ->withPivot('company_id')
            ->withPivot('service_id');
    }
}
