<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Advertisement;
use Illuminate\Http\Request;

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
}
