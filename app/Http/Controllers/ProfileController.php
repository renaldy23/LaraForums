<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Comment;
use App\Question;

class ProfileController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->id();
        $user = User::find($id);
        $data = [
            "title" => "My Profile | LaraForums",
            "user" => $user
        ];
        return view("profile.myprofile", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function active()
    {
        $id = auth()->id();
        $all = Comment::where("users_id", $id)->get();
        $comment = Comment::where("users_id", $id)->paginate(3);
        $data = [
            "title" => "My Profile | LaraForums",
            "comment" => $comment,
            "all" => $all
        ];
        return view("profile.mycomment", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function question()
    {
        $id = auth()->id();
        $all = Question::where("users_id", $id)->get();
        $question = Question::where("users_id", $id)->paginate(5);
        $data = [
            "title" => "My Profile | LaraForums",
            "question" => $question,
            "all" => $all
        ];
        return view("profile.myquestion", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function email(Request $request)
    {
        $pass = $request->pass;
        $id = auth()->id();
        $user = User::find($id);
        if (Hash::check($pass, $user->password)) {
            return view("profile.email");
        } else {
            session()->flash("false", "Password yang kamu masukkan salah!");
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newmail(Request $request)
    {
        $id = auth()->id();
        User::where("id", $id)->update([
            "email" => $request->email
        ]);
        session()->flash("email", "Email berhasil di rubah");
        return redirect()->to("/profile");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function name(Request $request)
    {
        $pass = $request->pass;
        $id = auth()->id();
        $user = User::find($id);
        if (Hash::check($pass, $user->password)) {
            return view("profile.name");
        } else {
            session()->flash("false", "Password yang kamu masukkan salah!");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newname(Request $request)
    {
        $id = auth()->id();
        User::where("id", $id)->update([
            "name" => $request->name
        ]);
        session()->flash("name", "Email berhasil di rubah");
        return redirect()->to("/profile");
    }
}
