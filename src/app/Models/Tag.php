<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Bookmark;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
