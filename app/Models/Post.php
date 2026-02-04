<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'user_id',
    ];

    protected static function booted()
    {
        static::updating(function ($post) {
            if ($post->isDirty('image')) {
                $original = $post->getOriginal('image');
                if ($original && Storage::disk('public')->exists($original)) {
                    Storage::disk('public')->delete($original);
                }
            }
        });

        static::deleting(function ($post) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
