<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User_customers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //TODO подумать как применить вставку в связанные таблицы (возможно транзакция)
        $dataUser['name'] = $request->input('name');
        $user = User_customers::create($dataUser);
        $dataFeedback['text'] = $request->input('comment');
        $dataFeedback['user_id'] = $user->id;
        if ($user) {
            $feedback = Feedback::create($dataFeedback);
        }
        if ($feedback) {
            return redirect()->route('feedback.create')
                ->with('success', 'Отзыв успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить отзыв');
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
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
