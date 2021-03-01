<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Question;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $id = auth()->id();
        $data = [
            "title" => "Category | LaraForums",
            "category" => Category::where("user_id", $id)->get()
        ];
        return view("category.list", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Category Create | LaraForums"
        ];
        return view("category.kategori", $data);
    }

    public function store(Request $request)
    {
        Category::create([
            "user_id" => auth()->id(),
            "name" => $request->name
        ]);
        session()->flash("category", "Berhasil menambah kategori");
        return redirect("/category");
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        session()->flash("delete", "Berhasil menghapus data category");
        return redirect("/category");
    }
}
