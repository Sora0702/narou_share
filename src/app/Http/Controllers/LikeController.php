<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LikeController extends Controller
{
    public function store(Request $request){
        $current_user_id = auth()->user()->id;
        $current_user = User::find($current_user_id);
        $tag_id = $request->id;
        if(!$current_user->is_tag($tag_id)){
            $current_user->tag_likes()->attach($tag_id);
        }
        $tags = $current_user->tag_likes()->orderBy('updated_at', 'asc')
        ->paginate(10);
        return to_route('tags.likes', compact('tags'));
    }

    public function destroy(Request $request){
        $current_user_id = auth()->user()->id;
        $current_user = User::find($current_user_id);
        $tag_id = $request->id;
        if($current_user->is_tag($tag_id)){
            $current_user->tag_likes()->detach($tag_id);
        }
        $tags = $current_user->tag_likes()->orderBy('updated_at', 'asc')
        ->paginate(10);
        return to_route('tags.likes', compact('tags'));
    }

    public function index(Request $request){
        $current_user_id = auth()->user()->id;
        $current_user = User::find($current_user_id);
        $search = $request->search;
        $updated = $request->updated;

        if($search){
            if($updated == 0){
                $tags = $current_user->tag_likes()->Title($search)
                ->orderBy('updated_at', 'asc')
                ->paginate(10);
            }else{
                $tags = $current_user->tag_likes()->Title($search)
                ->orderBy('updated_at', 'desc')
                ->paginate(10);
            }
        }else{
            $tags = $current_user->tag_likes()->orderBy('updated_at', 'asc')
            ->paginate(10);
        }

        return view('tags.likes', compact('tags'));
    }
}
