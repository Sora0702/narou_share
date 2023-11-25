<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tag;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['title','writer','ncode', 'genre', 'user_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeKeyword($query, $keyword)
    {
        if($keyword !== null){
            $keyword_split = mb_convert_kana($keyword, 's');
            $keyword_split2 = preg_split('/[\s]+/', $keyword_split);
            foreach($keyword_split2 as $value){
                $query->where('title', 'like', '%'.$value.'%')
                ->orWhere('writer', 'like', '%'.$value.'%');
            }
        }
        return $query;
    }
}
