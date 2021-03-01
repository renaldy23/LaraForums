<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Question;

class CommentController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }

    public function store(Request $request, $id)
    {
        if ($request->file("image") != null) {
            $image = $request->file("image")->store("image");
        } else {
            $image = "null";
        }

        Comment::where("questions_id", $id)->create([
            "body" => $request->comment,
            "users_id" => auth()->id(),
            "questions_id" => $id,
            "image" => $image
        ]);
        $data = Question::find($id);
        $old = $data->comment;
        $new = $old + 1;
        Question::find($id)->update([
            "comment" => $new
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $id_data = request()->id;
        $data = Question::find($id_data);
        $old = $data->comment;
        $new = $old - 1;
        Question::find($id_data)->update([
            "comment" => $new
        ]);
        $comment = Comment::find($id);
        \Storage::delete($comment->image);
        Comment::find($id)->delete();
        return redirect()->back();
    }
}
