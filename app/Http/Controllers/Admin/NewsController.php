<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNews;
use App\Http\Requests\UpdateNews;
use App\Models\Category;
use App\Models\News;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Http\JsonResponse;
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
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateNews $request
     * @return RedirectResponse
     */
    public function store(CreateNews $request): RedirectResponse
    {

        $news = new News($request->validated()); // возвращаем отвалидированные данные $request->validated()
        $category = Category::find($request->validated()['category_id']);
        $newsStatus = $category->news()->save($news);
        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param $news
     * @return Response
     */
    public function show($news)
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
            'news' => $news,
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(UpdateNews $request, News $news): RedirectResponse
    {

        $news = $news->fill($request->validated());
        $news->category_id = $request->validated()['category_id'];
        if ($news->save()) {
            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(News $news): JsonResponse
    {

        try {
            if (\request()->ajax()) {
                $news->delete();
                return response()->json(['success', true]);
            }
        } catch (\Exception $e) {
            return response()->json(['success', false]);
        }
    }
}
