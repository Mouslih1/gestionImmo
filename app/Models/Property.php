<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'city',
        'address',
        'postal_code',
        'sold'
    ];

    protected $casts = ['sold' => 'boolean'];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->title);
    }

    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('sold', false);
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }

}
