<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Http\Requests\StoreBookmarkRequest;

class BookmarkController extends Controller
{
    public function research()
    {
        return view('bookmarks.research');
    }

    public function result(Request $request)
    {
        $keyword = $request->keyword;
        $base_url = 'https://api.syosetu.com/novelapi/api/?out=json&title=1&wname=1&word=';
        $send_url = $base_url.$keyword;

        $client = new Client();
        $response = $client->request('GET', $send_url);

        $results = $response->getBody();
        $results = json_decode($results, true);

        if (count($results) == 1) {
            return to_route('bookmarks.research')->with('flash_message', '小説が見つかりません。再度検索してください。');
        }

        return view('bookmarks.result', ['results' => $results]);
    }

    public function send(Request $request)
    {
        $input = $request->only('title', 'writer', 'ncode', 'genre');
        $request->session()->put('input', $input);

        return to_route('bookmarks.confirm');
    }

    public function confirm(Request $request)
    {
        $data = $request->session()->get('input');
        if (!$data) {
            return to_route('bookmarks.research');
        }
        $tags = Tag::pluck('title', 'id')->toArray();

        return view('bookmarks.confirm', ['data' => $data], compact('tags'));
    }

    public function store(StoreBookmarkRequest $request)
    {
        $bookmark = Bookmark::create([
            'title' => $request->title,
            'writer' => $request->writer,
            'ncode' => $request->ncode,
            'genre' => $request->genre
        ]);
        $bookmark->tags()->sync($request->tags);
        return to_route('bookmarks.index');
    }

    public function index()
    {
        $bookmarks = Bookmark::select('title', 'writer', 'ncode', 'genre', 'id')
        ->paginate(10);

        return view('bookmarks.index', compact('bookmarks'));
    }

    public function edit($id)
    {
        $bookmark = Bookmark::find($id);
        $tags = Tag::pluck('title', 'id')->toArray();

        return view('bookmarks.edit', compact('bookmark', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $bookmark = Bookmark::find($id);

        $bookmark->tags()->sync($request->tags);
        return to_route('bookmarks.index');
    }

    public function destroy($id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();
        $bookmark->tags()->detach();

        return to_route('bookmarks.index')->with('flash_message', 'ブックマークを削除しました。');
    }
}
