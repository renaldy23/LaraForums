<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (isset($request->button)) {
            $search = $request->search;
            if ($search == null) {
                $question = Question::get();
            } else {
                $question = Question::where("body", 'like', "%" . $search . "%")
                    ->orWhere("title", 'like', "%" . $search . "%")
                    ->get();
            }
        } else {
            $question = Question::get();
        }
        $data = [
            "question" => $question,
            "title" => "Welcome | LaraForums"
        ];
        return view('question.index', $data);
    }
}
