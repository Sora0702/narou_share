<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['title','writer','ncode', 'genre'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
