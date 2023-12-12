<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replie extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'comment_id',
        'content',
    ];

    public function comments()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    protected $table = 'replies';
}
