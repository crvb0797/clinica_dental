<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'update_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*POLYMORPHIC RELATIONSHIP 1:1 */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
