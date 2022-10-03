<?php

namespace App\Http\Controllers\Admin;
use App\Models\History;
use App\Http\Requests\HistoryCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function create(HistoryCreateRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        $history = History::updateOrCreate(
            [
                'email' => $user->email,
                'course_id' => $data['course_id'],
            ],
            $data
        );
        return response()->json($history, 200);
    }

    public function getAll()
    {
        $user = Auth::user();
        $histories = History::with(['course', 'chapter'])->where('email', $user->email)->paginate(10);
        Paginator::useBootstrap();
        return view('profile.history', ['histories' => $histories]);
    }
}
