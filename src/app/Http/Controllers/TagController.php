<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Bookmark;
use App\Http\Requests\StoreTagRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $current_user_id = auth()->user()->id;
        $search = $request->search;
        $updated = $request->updated;

        if($search){
            if($updated == 1){
                $tags = Tag::Title($search)->with('user')
                ->where('user_id', $current_user_id)->orderBy('updated_at', 'asc')
                ->paginate(10);
            }else{
                $tags = Tag::Title($search)->with('user')
                ->where('user_id', $current_user_id)->orderBy('updated_at', 'desc')
                ->paginate(10);
            }

            return view('tags.index', compact('tags', 'updated'));
        }else{
            $tags = Tag::with('user')
            ->where('user_id', $current_user_id)
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

            return view('tags.index', compact('tags'));
        }
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
        $current_user_id = auth()->user()->id;
        $tag = Tag::find($id);
        $bookmarks = $tag->bookmarks()->paginate(10);
        $isLike = $tag->is_like($current_user_id);

        return view('tags.show', compact('tag', 'bookmarks', 'isLike'));
    }

    public function edit($id)
    {
        $current_user_id = auth()->user()->id;
        $tag = Tag::find($id);

        if($current_user_id == $tag->user_id){
            return view('tags.show', compact('tag'));
        }else{
            return to_route('tags.index')->with('flash_message', '他ユーザの作成したタグは編集できません。');
        }
    }

    public function update(StoreTagRequest $request, $id)
    {
        $current_user = auth()->user();
        $tag = Tag::find($id);
        if ($current_user->id == $tag->user_id){
            $tag->title = $request->title;
            $tag->user_id = $current_user;
            $tag->save();
        }

        return to_route('tags.index');
    }

    public function destroy($id)
    {
        $current_user_id = auth()->user()->id;
        $tag = Tag::find($id);

        if($current_user_id == $tag->user_id){
            $tag->delete();
            return to_route('tags.index');
        }else{
            return to_route('tags.index')->with('flash_message', '他ユーザの作成したタグは削除できません。');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $keyword = $request->keyword;
        $genre = $request->genre;
        $updated = $request->updated;
        $current_user_id = auth()->user()->id;

        if($genre){
            $bookmarks = Bookmark::with('tags')
            ->where('genre', $genre)
            ->where('user_id', '<>', $current_user_id)
            ->get();
            $collection = new Collection();
            foreach($bookmarks as $bookmark){
                foreach($bookmark->tags as $tag){
                    $collection->push($tag);
                }
            }
            $data = $collection->unique();
            $tags = $this->paginate($data, 10, null, ['path' => '/tags/search?genre='.$genre]);

            return view('tags.search', compact('tags'));
        }else if($keyword){
            $bookmarks = Bookmark::with('tags')
            ->keyword($keyword)
            ->where('user_id', '<>', $current_user_id)
            ->get();
            $collection = new Collection();
            foreach($bookmarks as $bookmark){
                foreach($bookmark->tags as $tag){
                    $collection->push($tag);
                }
            }
            $data = $collection->unique();
            $tags = $this->paginate($data, 10, null, ['path' => '/tags/search?keyword='.$keyword]);

            return view('tags.search', compact('tags'));
        }else if($search){
            $query = Tag::title($search);
            if($updated == 1){
                $tags = $query->select('title', 'user_id', 'id')
                ->where('user_id', '<>', $current_user_id)
                ->orderBy('created_at', 'asc')
                ->paginate(10);
            }elseif($updated == 2){
                $tags = $query
                ->withCount('likes')
                ->where('user_id', '<>', $current_user_id)
                ->orderBy('likes_count', 'desc')
                ->paginate(10);
            }else{
                $tags = $query->select('title', 'user_id', 'id')
                ->where('user_id', '<>', $current_user_id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            }
            return view('tags.search', compact('tags', 'updated'));
        }else{
            $recommend_tags = Tag::withCount('likes')
            ->where('user_id', '<>', $current_user_id)
            ->orderBy('likes_count', 'desc')
            ->limit(4)
            ->get();
            return view('tags.search', compact('recommend_tags'));
        }
    }

    private function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
