<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = Category::where('is_visible', true)->paginate(5); // постраничный вывод

        return view('admin.news.categories.index', [
            'categories' => $categories,
            'count' => Category::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //TODO должна быть валидация
        $data = $request->only(['title', 'description', 'is_visible']);
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('admin.category.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string
     */
    public function show(int $id): string
    {
        return 'показать категории в админке';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View|Response
     */
    public function edit(Category $category)
    {
//        $category = Category::findOrFail($id); альтернатива если мы получаем id и сами получаем объект
        return view('admin.news.categories.edit',
            [
                'category' => $category
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'is_visible']);
        $categoryStatus = $category->fill($data)->save();
        if ($categoryStatus) {
            return redirect()->route('admin.category.index')
                ->with('success', 'Запись успешно изменилась');
        }
        return back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category): RedirectResponse
    {
        $categoryStatus = $category->delete();
        if ($categoryStatus) {
            return redirect()->route('admin.category.index')
                ->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
