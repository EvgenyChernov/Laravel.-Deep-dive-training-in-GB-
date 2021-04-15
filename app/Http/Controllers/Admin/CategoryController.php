<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

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
     * @param CreateCategory $request
     * @return RedirectResponse
     */
    public function store(CreateCategory $request): RedirectResponse
    {
        $data = $request->only(['title', 'description', 'is_visible']);
        $category = Category::create($data);
        if ($category) {
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
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
     * @param UpdateCategory $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(UpdateCategory $request, Category $category): RedirectResponse
    {
        $categoryStatus = $category->fill($request->validated())->save();
        if ($categoryStatus) {
            return redirect()->route('admin.category.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
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
