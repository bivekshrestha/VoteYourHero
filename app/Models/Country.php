<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * @return HasMany
     */
    public function heroes(): HasMany
    {
        return $this->hasMany(Hero::class)
            ->orderBy('votes', 'desc')
            ->where('is_verified', true);
    }

    /**
     * @return HasMany
     */
    public function supporters()
    {
        return $this->hasMany(Supporter::class);
    }

    /**
     * @return HasMany
     */
    public function sponsors()
    {
        return $this->supporters()->where('type', 'sponsor');
    }

    /**
     * @return HasMany
     */
    public function producers()
    {
        return $this->supporters()->where('type', 'producer');
    }

}
