<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class GuestModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'type', 'is_gift'];
    protected $table = 'guests';

    protected static function booted()
    {
        static::creating(function ($invitation) {
            $invitation->slug = Str::slug($invitation->name);
        });
    }
}
