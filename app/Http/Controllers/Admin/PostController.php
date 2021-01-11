<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class PostController extends Controller
{
    public function add_news(Request $request)
    {


        $request->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'imageFile' => 'required|image',
                'details' => 'required',
            ],
            [
                'category_id.required' => 'category is required',

            ]
        );

        $name_list =  explode(" ", $request->title);
        $name_list = array_map('strtolower', $name_list);
        $post_slug = implode("-", $name_list);
        $similar_slug = DB::table('posts')->where('slug', 'like', $post_slug . '%')->get();
        if (count($similar_slug) > 0) {
            $slug = $post_slug . '-' . Str::random(20);
        } else {
            $slug = $post_slug;
        }

        $file = '';
        $upload_path = public_path('uploads/post');
        if ($request->hasFile('imageFile')) {

            $file = $request->file('imageFile');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move($upload_path, $name);
        }

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->details = $request->details;
        $post->date = date('Y-m-d');
        $post->time = date('H:i:s');
        $post->image = $name;
        $post->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
        $post->save();
    }

    public function slug_generation()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $name_list =  explode(" ", $post->title);
            $name_list = array_map('strtolower', $name_list);
            $post_slug = implode("-", $name_list);

            $similar_slug = DB::table('posts')->where('slug', 'like', $post_slug . '%')->get();
            if (count($similar_slug) > 0) {
                $slug = $post_slug . '-' . strval(count($similar_slug));
            } else {
                $slug = $post_slug;
            }

            $post->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
            $post->save();
        }
        return response()->json($posts);
    }

    public function all_post()
    {

        $posts = Post::orderBy('id', 'DESC')->paginate(8);
        // dd($categories->data);
        return response()->json(['posts' => $posts]);
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $file_path = public_path('uploads/post/' . $post->image);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $post->delete();
    }

    public function edit_post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return response()->json(['post' => $post]);
    }

    public function update_post(Request $request)
    {


        $request->validate(
            [
                'title' => 'required',
                'category_id' => 'required',
                'details' => 'required',
            ],
            [
                'category_id.required' => 'category is required',

            ]
        );

        $name_list =  explode(" ", $request->title);
        $name_list = array_map('strtolower', $name_list);
        $post_slug = implode("-", $name_list);
        $similar_slug = DB::table('posts')->where('slug', 'like', $post_slug . '%')->get();
        if (count($similar_slug) > 0) {
            $slug = $post_slug . '-' . Str::random(20);
        } else {
            $slug = $post_slug;
        }

        $post = Post::find($request->id);

        $file = '';
        $upload_path = public_path('uploads/post');
        if ($request->hasFile('imageFile')) {

            $file_path = public_path('uploads/post/' . $post->image);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('imageFile');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move($upload_path, $name);
            $post->image = $name;
        } else {
            $post->image = $request->image;
        }

        $post->title = trim($request->title);
        $post->category_id = $request->category_id;
        $post->details = $request->details;
        $post->date = date('Y-m-d');
        $post->time = date('H:i:s');
        $post->slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
        $post->save();
    }
}
