<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProjectCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'color',
        'icon',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
