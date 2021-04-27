<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ResourceStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateResource;
use App\Http\Requests\UpdateResource;
use App\Models\Resource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $resources = Resource::select(['id', 'title', 'body', 'status', 'created_at'])->get();
        return view('admin.parsresource.index', [
            'resources' => $resources,
            'count' => Resource::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.parsresource.create', [
            'statuses' => collect([
                ResourceStatusEnum::NOT_ACTIVE => "Не активен",
                ResourceStatusEnum::ACTIVE => "Активен",
            ]),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateResource $request
     * @return RedirectResponse
     */
    public function store(CreateResource $request)
    {
        $resourceStatus = Resource::create($request->validated())->save();
        if ($resourceStatus) {
            return redirect()->route('admin.resource.index')
                ->with('success', __('messages.admin.resource.create.success'));
        }
        return back()->with('error', __('messages.admin.resource.create.fail'));
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
     * @param Resource $resource
     * @return Application|Factory|View|Response
     */
    public function edit(Resource $resource)
    {
        //        $category = Category::findOrFail($id); альтернатива если мы получаем id и сами получаем объект

        return view('admin.parsresource.edit',
            [
                'resource' => $resource,
                'statuses' => collect([
                     ResourceStatusEnum::NOT_ACTIVE => "Не активен",
                     ResourceStatusEnum::ACTIVE => "Активен",
                ]),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateResource $request
     * @param Resource $resource
     * @return RedirectResponse
     */
    public function update(UpdateResource $request, Resource $resource)
    {
        $resourceStatus = $resource->fill($request->validated())->save();
        if ($resourceStatus) {
            return redirect()->route('admin.resource.index')
                ->with('success', __('messages.admin.resource.update.success'));
        }
        return back()->with('error', __('messages.admin.resource.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Resource $resource): RedirectResponse
    {
        $resourceStatus = $resource->delete();
        if ($resourceStatus) {
            return redirect()->route('admin.resource.index')
                ->with('success', 'Запись успешно удалена'); // TODO переделать отображение ошибок
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
