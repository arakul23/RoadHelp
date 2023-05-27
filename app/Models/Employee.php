<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string surname
 * @property string patronymic
 * @property integer country_id
 * @property string referral_link
 * @property integer count_visit
 * @property string special_marks

 */

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'patronymic', 'country_id', 'referral_link', 'special_marks'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
