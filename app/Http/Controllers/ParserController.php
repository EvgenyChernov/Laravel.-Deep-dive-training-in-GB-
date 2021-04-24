<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Services\ParserService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
        $newsData = $service->setUrl('http://news.yandex.ru/music.rss')->parsing();
        $category = Category::where('title', "=", $newsData['title'])->firstOrCreate([
            'title' => $newsData['title'],
            'description' => $newsData['description']
        ]);
        foreach ($newsData["news"] as $news) {
            $news = new News([
                'title' => $news['title'],
                'text' => mb_substr($news['description'], 0, 255),
                'slug' => mb_substr($news['link'], 0, 191),
            ]);
            $newsStatus = $category->news()->save($news);
        }
        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
    }
}
