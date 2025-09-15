<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Guests;

class MessageModel extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'guest_id',
        'name',
        'message',
    ];

    public function guest()
    {
        return $this->belongsTo(Guests::class, 'guest_id');
    }
}
