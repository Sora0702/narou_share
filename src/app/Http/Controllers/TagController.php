<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Bookmark;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    public function index()
    {
        $current_user_id = auth()->user()->id;
        $tags = Tag::select('title', 'id')->where('user_id', $current_user_id)
        ->paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $current_user = auth()->user();
        Tag::create([
            'title' => $request->title,
            'user_id' => $current_user->id
        ]);

        return to_route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        $bookmarks = $tag->bookmarks()->paginate(10);

        return view('tags.show', compact('tag', 'bookmarks'));
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.show', compact('tag'));
    }

    public function update(StoreTagRequest $request, $id)
    {
        $current_user = auth()->user();
        $tag = Tag::find($id);
        $tag->title = $request->title;
        $tag->user_id = $current_user;
        $tag->save();

        return to_route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return to_route('tags.index');
    }
}
