<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'touring_id',
        'content',
    ];

    public function touring()
    {
        return $this->belongsTo(Touring::class, 'touring_id', 'id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany(Replie::class, 'comment_id', 'id');
    }

    protected $table = 'comments';
}
