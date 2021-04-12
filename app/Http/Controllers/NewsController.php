<?php

namespace App\Http\Controllers;

use App\Enums\NewsStatusEnum;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')
            ->select('id', 'title', 'text', 'created_at', 'category_id')
            ->where('news.status', NewsStatusEnum::PUBLISHED)
            ->get();
        return view('news.index', ['news' => $news]);
    }

    public function show(int $id)
    {
        $news = News::findOrFail($id);
        return view('news.show', ['news' => $news]);
    }
}
