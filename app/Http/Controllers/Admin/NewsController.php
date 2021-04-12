<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::select(['id', 'title', 'text', 'created_at'])->get();
        return view('admin.news.index', [
            'news' => $news,
            'count' => News::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|ViewAlias|Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'min:2']
        ]);
//        dd($request->has('title')); // проверка на существование
//        $title = $request->input('title', 'Заголовок'); // получение 1 значения
//        $allowFields =  $request->only('title', 'slug'); // получение указанных полей в виде массива
//        $allowFields = $request->except('title', 'slug', 'description'); // получение всех полей кроме указанных
//        $allowFields = $request->only('title', 'slug', 'description');
        $date = $request->only('category_id', 'title', 'slug', 'text');
        $newsStatus = News::create($date);
        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|ViewAlias|Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $request->only(['title', 'text', 'status']);
        $newsStatus = $news->fill($data)->save();
        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно изменилась');
        }
        return back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(News $news): RedirectResponse
    {
        $newsStatus = $news->delete();
        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
