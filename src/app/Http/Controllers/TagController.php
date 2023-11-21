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
        $tags = Tag::select('title', 'id')
        ->paginate(10);

        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        Tag::create([
            'title' => $request->title,
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
        $tag = Tag::find($id);
        $tag->title = $request->title;
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
