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
        $current_user_id = auth()->user()->id;
        $tags = Tag::with('user')->where('user_id', $current_user_id)->pluck('title', 'id')->toArray();

        return view('bookmarks.confirm', ['data' => $data], compact('tags'));
    }

    public function store(StoreBookmarkRequest $request)
    {
        $current_user = auth()->user();
        $bookmark = Bookmark::create([
            'title' => $request->title,
            'writer' => $request->writer,
            'ncode' => $request->ncode,
            'genre' => $request->genre,
            'user_id' => $current_user->id,
        ]);
        $bookmark->tags()->sync($request->tags);

        return to_route('bookmarks.index');
    }

    public function index(Request $request)
    {
        $current_user_id = auth()->user()->id;
        $keyword = $request->keyword;
        $genre = $request->genre;
        $updated = $request->updated;

        if($keyword){
            if($updated == 1){
                $bookmarks = Bookmark::with('user')
                ->where('user_id', $current_user_id)
                ->keyword($keyword)->orderBy('created_at', 'asc')
                ->paginate(10);
            }else{
                $bookmarks = Bookmark::with('user')
                ->where('user_id', $current_user_id)
                ->keyword($keyword)->orderBy('created_at', 'desc')
                ->paginate(10);
            }
        }elseif($genre){
            if($updated == 1){
                $bookmarks = Bookmark::with('user')
                ->where('user_id', $current_user_id)
                ->where('genre', $genre)->orderBy('created_at', 'asc')
                ->paginate(10);
            }else{
                $bookmarks = Bookmark::with('user')
                ->where('user_id', $current_user_id)
                ->where('genre', $genre)->orderBy('created_at', 'desc')
                ->paginate(10);
            }
        }else{
            $bookmarks = Bookmark::with('user')->where('user_id', $current_user_id)
            ->paginate(10);
        }

        return view('bookmarks.index', compact('bookmarks', 'updated'));
    }

    public function edit($id)
    {
        $current_user_id = auth()->user()->id;
        $bookmark = Bookmark::find($id);
        if($current_user_id == $bookmark->user_id){
            $tags = Tag::with('user')->where('user_id', $current_user_id)->pluck('title', 'id')->toArray();

            return view('bookmarks.edit', compact('bookmark', 'tags'));
        }else{
            return to_route('bookmarks.index')->with('flash_message', '他ユーザーの登録したブックマークは編集できません。');
        }
    }

    public function update(Request $request, $id)
    {
        $bookmark = Bookmark::find($id);

        $bookmark->tags()->sync($request->tags);
        return to_route('bookmarks.index');
    }

    public function destroy($id)
    {
        $current_user_id = auth()->user()->id;
        $bookmark = Bookmark::find($id);
        if($current_user_id == $bookmark->user_id){
            $bookmark->delete();
            $bookmark->tags()->detach();

            return to_route('bookmarks.index')->with('flash_message', 'ブックマークを削除しました。');
        }else{
            return to_route('bookmarks.index')->with('flash_message', '他ユーザーの登録したブックマークは削除できません。');
        }
    }
}
