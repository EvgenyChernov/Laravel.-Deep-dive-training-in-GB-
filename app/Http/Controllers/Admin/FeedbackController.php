<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\User_customers;
use Illuminate\Contracts\Foundation\Application as ApplicationAlias;
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
     * @return ApplicationAlias|Factory|View|Response
     */
    public function index()
    {
        $reviews = Feedback::with('userCustomers')
            ->get();
        return view('admin.feedback.index', [
            'count' => Feedback::count(),
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * @param Feedback $feedback
     * @return ApplicationAlias|Factory|View|Response
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', [
            'feedback' => $feedback
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback): RedirectResponse
    {
        //TODO подумать как применить вставку в связанные таблицы (возможно транзакция)
        $dataFeedback['text'] = $request->input('text');
        $feedbackStatus = $feedback->fill($dataFeedback)->save();
        $dataUser['name'] = $request->input('name');
        $userStatus = (User_customers::find($feedback->user_id))->fill($dataUser)->save();
        if ($feedbackStatus && $userStatus) {
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Запись успешно изменилась');
        }
        return back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function destroy(Feedback $feedback): RedirectResponse
    {
        $user = User_customers::find($feedback->user_id);
        $feedbackStatus = $feedback->delete();
        $userStatus = $user->delete();
        if ($feedbackStatus && $userStatus) {
            return redirect()->route('admin.feedback.index')
                ->with('success', 'Запись успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить запись');
    }
}
