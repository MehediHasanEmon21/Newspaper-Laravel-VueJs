<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Post;
use App\Model\Advertisement;
use App\Model\Comment;
use App\Model\PostView;

class HomeController extends Controller
{
    public function all_category()
    {
        if (!\Request::ajax()) {
            return abort(404);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return response()->json(['categories' => $categories]);
    }

    public function home_post()
    {
        $slider_ads = Advertisement::where('slider', 'true')->orderBy('id', 'DESC')->get();
        $top_ad = Advertisement::where('top', 'true')->first();
        $middle_ad = Advertisement::where('middle', 'true')->first();
        $center_ad = Advertisement::where('center', 'true')->first();
        $top_bottom = Advertisement::where('top_bottom', 'true')->first();
        $latest_posts = Post::orderBy('id', 'DESC')->limit(9)->get();
        foreach ($latest_posts as $key => $lp) {
            $this->helper($lp);
        }
        $random_posts = Post::inRandomOrder()->limit(3)->get();
        $entertainment_posts = Post::where('category_id', 7)->limit(2)->get();
        foreach ($entertainment_posts as $key => $ep) {
            $this->helper($ep);
        }
        $sport_posts = Post::where('category_id', 3)->limit(6)->orderBy('id', 'DESC')->get();
        foreach ($sport_posts as $key => $sp) {
            $this->helper($sp);
        }
        $international_big = Post::with(['category', 'admin'])->where('category_id', 2)->orderBy('id', 'DESC')->first();
        $international_big->desc = substr($international_big->details, 0, 100);
        $international_big->date_fm = date('M j, Y', strtotime($international_big->date));

        $international_posts = Post::where('category_id', 2)->where('id', '!=', $international_big->id)->limit(4)->orderBy('id', 'DESC')->get();
        foreach ($international_posts as $key => $ip) {
            $this->helper($ip);
        }
        $bangladesh_posts = Post::where('category_id', 1)->limit(6)->get();
        foreach ($bangladesh_posts as $key => $bp) {
            $this->helper($bp);
        }
        $popular_posts = PostView::limit(5)->distinct()->orderBy('id', 'DESC')->get();
        foreach ($popular_posts as $key => $pp) {
            $pp->date_fm = date('M j, Y', strtotime($pp->post->date));
        }

        return response()->json(
            [
                'slider_ads' => $slider_ads,
                'latest_posts' => $latest_posts,
                'random_posts' => $random_posts,
                'entertainment_posts' => $entertainment_posts,
                'sport_posts' => $sport_posts,
                'international_big' => $international_big,
                'international_posts' => $international_posts,
                'bangladesh_posts' => $bangladesh_posts,
                'top_ad' => $top_ad,
                'middle_ad' => $middle_ad,
                'center_ad' => $center_ad,
                'top_bottom' => $top_bottom,
                'popular_posts' => $popular_posts,
            ]
        );
    }

    public function helper($data)
    {

        $data->desc = substr($data->details, 0, 100);
        $data->date_fm = date('M j, Y', strtotime($data->date));
    }

    public function singlePost($slug)
    {

        $post = Post::where('slug', $slug)->first();
        $post->date_fm1 = date('M', strtotime($post->date));
        $post->date_fm2 = date('d', strtotime($post->date));
        $post->comment = Comment::where('post_id', $post->id)->get()->count();
        $categories = Category::orderBy('name', 'ASC')->limit(5)->get();
        $related_posts = Post::where('category_id', '!=', $post->id)->where('category_id', $post->category_id)->limit(3)->get();
        $latest_posts = Post::orderBy('id', 'DESC')->limit(5)->get();
        foreach ($latest_posts as $key => $lp) {
            $this->helper($lp);
        }
        $pv = new PostView();
        $pv->post_id = $post->id;
        $pv->save();
        foreach ($related_posts as $key => $rp) {
            $this->helper($rp);
        }
        return response()->json([
            'post' => $post,
            'categories' => $categories,
            'related_posts' => $related_posts,
            'latest_posts' => $latest_posts,
        ]);
    }

    public function add_comment(Request $request)
    {
        $this->validate($request, [
            'text' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;
        $comment->save();
    }

    public function all_comment($slug)
    {

        $post = Post::where('slug', $slug)->first();
        $comments = Comment::where('post_id', $post->id)->orderBy('id', 'DESC')->get();
        return response()->json([
            'comments' => $comments,
        ]);
    }

    public function all_categories_post($slug)
    {

        $category = Category::where('slug', $slug)->first();
        $category_posts = Post::where('category_id', $category->id)->orderBy('id', 'DESC')->paginate(5);
        $categories = Category::orderBy('name', 'ASC')->limit(5)->get();
        $latest_posts = Post::orderBy('id', 'DESC')->limit(5)->get();
        foreach ($latest_posts as $key => $lp) {
            $this->helper($lp);
        }
        foreach ($category_posts as $key => $cp) {
            $cp->date_fm1 = date('M', strtotime($cp->date));
            $cp->date_fm2 = date('d', strtotime($cp->date));
            $cp->desc = substr($cp->details, 0, 200);
            $comment_count = Comment::where('post_id', $cp->id)->get()->count();
            $cp->comment = $comment_count;
        }
        return response()->json([
            'category_posts' => $category_posts,
            'categories' => $categories,
            'latest_posts' => $latest_posts
        ]);
    }
}
