<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guests extends Model
{
    protected $fillable = ['name', 'slug', 'type', 'is_gift'];

    protected static function booted()
    {
        static::creating(function ($invitation) {
            $invitation->slug = Str::slug($invitation->name);
        });
    }
}
