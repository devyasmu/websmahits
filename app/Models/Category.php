<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
