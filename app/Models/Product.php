<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'price',
        'content',
        'published_at',
        'user_id',
        'meta_description',
        'variants',
        'SKU',
    ];
    protected $casts = [
        'variants' => 'array',
        'content' => 'array'
    ];

    protected $attributes = [
        'meta_description' => 'Descripción por defecto',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stock(): HasOne
    {
        return $this->hasOne(Stock::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function excerpt(): string
    {
        return Str::words(tiptap_converter()->asText($this->content), 40, '...');
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }
}
