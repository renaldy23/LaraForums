<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Category;
use App\Comment;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->id();
        $category = Category::where("user_id", $id)->get();
        $data = [
            "title" => "Create your Question",
            "category" => $category
        ];
        return view("question.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file("image") == null) {
            $imageURL = "null";
        } else {
            $image = $request->file("image");
            $imageURL = $image->store("image");
        }
        Question::create([
            "title" => $request->title,
            "body" => $request->body,
            "category_id" => $request->category,
            "users_id" => auth()->id(),
            "image" => $imageURL
        ]);
        session()->flash("question", "Berhasil membuat pertanyaan");
        return redirect("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::where("id", $id)->first();
        $comment = Comment::where("questions_id", $id)->latest()->get();
        $data = [
            "question" => $question,
            "comments" => $comment,
            "active" => "show"
        ];
        return view("question.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $user_id = auth()->id();
        $category = Category::where("user_id", $user_id)->get();
        $data = [
            "title" => "Edit Question | LaraForums",
            "question" => $question,
            "category" => $category
        ];
        return view("question.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if ($request->file("image")) {
            \Storage::delete($question->image);
            $image = $request->file("image")->store("image");
        } else {
            $image = $question->image;
        }

        Question::where("id", $id)->update([
            "title" => $request->title,
            "body" => $request->body,
            "category_id" => $request->category,
            "users_id" => auth()->id(),
            "image" => $image
        ]);
        session()->flash("update", "Berhasil mengupdate data");
        return redirect()->to("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        \Storage::delete($question->image);
        Question::find($id)->delete();
        session()->flash("delete", "berhasil menghapus pertanyaan");
        return redirect()->back();
    }
}
