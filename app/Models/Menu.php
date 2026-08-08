<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'target',
        'parent_id',
        'order',
        'is_active',
        'show_in_bottom_nav',
        'icon',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_bottom_nav' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Scope: menu yang ditampilkan di navbar bawah (mobile).
     */
    public function scopeInBottomNav($query)
    {
        return $query->where('show_in_bottom_nav', true);
    }
}
