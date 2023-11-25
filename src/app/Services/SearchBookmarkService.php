<?

namespace App\Services;


use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Collection;

class SearchBookmarkService
{
    public static function searchKeyword($keyword)
    {
        $bookmarks = Bookmark::keyword($keyword)->get();
        $collection = new Collection();
        foreach($bookmarks as $bookmark){
            foreach($bookmark->tags as $tag){
                $collection->push($tag);
            }
        }
        $data = $collection->unique();
        return $data;
    }

    public static function searchGenre($genre)
    {
        $bookmarks = Bookmark::where('genre', $genre)->get();
        $collection = new Collection();
        foreach($bookmarks as $bookmark){
            foreach($bookmark->tags as $tag){
                $collection->push($tag);
            }
        }
        $data = $collection->unique();
        return $data;
    }
}
