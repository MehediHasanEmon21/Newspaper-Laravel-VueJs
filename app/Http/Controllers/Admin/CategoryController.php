<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $name_list =  explode(" ", $request->name);
        $name_list = array_map('strtolower', $name_list);
        $category_slug = implode("-", $name_list);
        $similar_slug = DB::table('categories')->where('slug', 'like', $category_slug . '%')->get();
        if (count($similar_slug) > 0) {
            $slug = $category_slug . '-' . Str::random(20);
        } else {
            $slug = $category_slug;
        }

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
    }

    public function all_category()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(3);
        // dd($categories->data);
        return response()->json(['categories' => $categories]);
    }

    public function all_categories()
    {
        if (!\Request::ajax()) {
            return abort(404);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return response()->json(['categories' => $categories]);
    }

    public function delete_category($slug)
    {

        $category = Category::where('slug', $slug)->first();
        $category->delete();
    }

    public function edit_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return response()->json(['category' => $category]);
    }

    public function update_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $name_list =  explode(" ", $request->name);
        $name_list = array_map('strtolower', $name_list);
        $category_slug = implode("-", $name_list);
        $similar_slug = DB::table('categories')->where('slug', 'like', $category_slug . '%')->get();
        if (count($similar_slug) > 0) {
            $slug = $category_slug . '-' . Str::random(20);
        } else {
            $slug = $category_slug;
        }

        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
    }
}
