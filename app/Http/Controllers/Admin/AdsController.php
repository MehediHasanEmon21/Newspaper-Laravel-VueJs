<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Model\Comment;
use App\Model\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\BreakingPost;
use App\Model\Setting;

class AdsController extends Controller
{
    public function add_ads(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'link' => 'required',
                'imageFile' => 'required|image',
            ]

        );

        $file = '';
        $upload_path = public_path('uploads/ads');
        if ($request->hasFile('imageFile')) {

            $file = $request->file('imageFile');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move($upload_path, $name);
        }

        $ads = new Advertisement();
        $ads->title = $request->title;
        $ads->link = $request->link;
        $ads->description = $request->description;
        $ads->image = $name;
        $ads->top = $request->top;
        $ads->slider = $request->slider;
        $ads->middle = $request->middle;
        $ads->middle = $request->middle;
        $ads->center = $request->center;
        $ads->top_bottom = $request->top_bottom;
        $ads->save();
    }

    public function all_ads()
    {
        $all_ads = Advertisement::orderBy('id', 'DESC')->paginate(8);
        return response()->json(['ads' => $all_ads]);
    }

    public function delete_ads($id)
    {

        $ads = Advertisement::find($id);
        $file_path = public_path('uploads/ads/' . $ads->image);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $ads->delete();
    }

    public function edit_ads($id)
    {
        $ad = Advertisement::where('id', $id)->first();
        return response()->json(['ad' => $ad]);
    }

    public function update_ads(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'link' => 'required',
            ]

        );


        $ad = Advertisement::find($request->id);

        $file = '';
        $upload_path = public_path('uploads/ads');
        if ($request->hasFile('imageFile')) {

            $file_path = public_path('uploads/ads/' . $ad->image);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('imageFile');
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move($upload_path, $name);
            $ad->image = $name;
        } else {
            $ad->image = $request->image;
        }

        $ad->title = $request->title;
        $ad->link = $request->link;
        $ad->description = $request->description;
        $ad->top = $request->top;
        $ad->slider = $request->slider;
        $ad->middle = $request->middle;
        $ad->middle = $request->middle;
        $ad->center = $request->center;
        $ad->top_bottom = $request->top_bottom;
        $ad->save();
    }

    public function all_comments()
    {
        $comments = Comment::orderBy('id', 'DESC')->get();
        return response()->json([
            'comments' => $comments,
        ]);
    }

    public function comment_delete($id)
    {

        $comment = Comment::find($id);
        $comment->delete();
    }

    public function all_users()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'users' => $users,
        ]);
    }

    public function search($term)
    {
        $posts = DB::table('posts')
            ->where('title', 'LIKE', '' . $term . '%')
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
        return response()->json($posts);
    }

    public function add_breaking_news(Request $request)
    {
        $bp = new BreakingPost();
        $bp->post_id = $request->id;
        $bp->save();
    }

    public function all_breaking_news()
    {
        $posts = BreakingPost::orderBy('id', 'DESC')->get();
        return response()->json([
            'posts' => $posts,
        ]);
    }

    public function breaking_news_delete($id)
    {
        $bn = BreakingPost::find($id);
        $bn->delete();
    }

    public function all_setting()
    {
        $settings = Setting::orderBy('id', 'DESC')->get();
        return response()->json([
            'settings' => $settings,
        ]);
    }

    public function edit_setting($id)
    {
        $setting = Setting::find($id);
        return response()->json([
            'setting' => $setting,
        ]);
    }

    public function update_setting(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'address' => 'required',
            ]

        );

        $setting = Setting::find($request->id);
        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->mobile = $request->mobile;
        $setting->address = $request->address;
        $setting->save();
    }
}
