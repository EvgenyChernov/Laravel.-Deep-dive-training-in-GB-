<?php

namespace App\Http\Controllers;

use App\Enums\ResourceStatusEnum;
use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use App\Services\ParserService;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class ParserController extends Controller
{
    public function __invoke(ParserService $service)
    {
        $rssLink = Resource::select('body')
            ->where('status', '=', ResourceStatusEnum::ACTIVE)
            ->get();
        // TODO переписать данные для парсинга в другое место
//        dd($rssLink);
//        [
//            'https://news.yandex.ru/auto.rss',
//            'https://news.yandex.ru/auto_racing.rss',
//            'https://news.yandex.ru/army.rss',
//            'https://news.yandex.ru/gadgets.rss',
//            'https://news.yandex.ru/index.rss',
//            'https://news.yandex.ru/martial_arts.rss',
//            'https://news.yandex.ru/communal.rss',
//            'https://news.yandex.ru/health.rss',
//            'https://news.yandex.ru/games.rss',
//            'https://news.yandex.ru/internet.rss',
//            'https://news.yandex.ru/cyber_sport.rss',
//            'https://news.yandex.ru/movies.rss',
//            'https://news.yandex.ru/cosmos.rss',
//            'https://news.yandex.ru/culture.rss',
//            'https://news.yandex.ru/fire.rss',
//            'https://news.yandex.ru/championsleague.rss',
//            'https://news.yandex.ru/music.rss',
//            'https://news.yandex.ru/nhl.rss',
//        ];

        foreach ($rssLink as $link) {
            NewsParsing::dispatch($link->body);
        }

        echo "Спасибо за обращение!";
//        $newsData = $service->setUrl('http://news.yandex.ru/music.rss')->parsing();
//        $category = Category::where('title', "=", $newsData['title'])->firstOrCreate([
//            'title' => $newsData['title'],
//            'description' => $newsData['description']
//        ]);
//        foreach ($newsData["news"] as $news) {
//            $news = new News([
//                'title' => $news['title'],
//                'text' => mb_substr($news['description'], 0, 255),
//                'slug' => mb_substr($news['link'], 0, 191),
//            ]);
//            $newsStatus = $category->news()->save($news);
//        }
//        if ($newsStatus) {
//            return redirect()->route('admin.news.index')
//                ->with('success', __('messages.admin.news.create.success'));
//        }
//        return back()->with('error', __('messages.admin.news.create.fail'));
    }
}
