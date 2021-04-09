<?php

namespace App\Models;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getCount(): int
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->count();
    }


    public function getNews(bool $isAdmin = false): Collection
    {
        if (!$isAdmin) {
            return \DB::table($this->table)
                ->join('categories', 'categories.id', '=', 'news.category_id')
                ->select(['news.id', 'news.title', 'news.text', 'news.created_at', 'categories.title as category_title'])
                ->where('news.status', NewsStatusEnum::PUBLISHED)
                ->get();
        }
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
//            ->where([
//                ['status', NewsStatusEnum::PUBLISHED],
//                ['title', 'like', '%' . request()->query('s') . '%']
//            ])
//            ->whereIn('id', [4,7,8])
//            ->whereNotIn('id', [7, 10])
//            ->whereBetween('id', [7, 10])
//            ->orWhere('id', '<', 3)
            ->get();
    }

    public function getNewsById(int $id): ?object
    {
        return \DB::table($this->table)
            ->select(['id', 'title', 'text', 'created_at'])
            ->find($id);
    }

    public function getNewsByCategoryId(int $idCategory): Collection
    {
        return \DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select(['news.id', 'news.title', 'news.text', 'news.created_at', 'categories.title as category_title', 'categories.id as category_id'])
            ->where([['news.status', NewsStatusEnum::PUBLISHED], ['category_id', $idCategory]])
            ->get();
    }

}
