<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Str;
use Auth;
class PostController extends Controller
{
    /**
     * Show a listing of resource
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        // sleep(5);
        $perPage = $request->get('perPage');
        $posts = Post::with('author')->paginate($perPage);
        // var_dump($posts[0]->author->name);die;
        return response($posts, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response($product, 200);
        return $product;
    }
    /**
     * Display the specified resource by slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function showBySlug(String $slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return response(['post' => $post], 200);
    }
    /** 
     * Store a new blog post
     * @param \Illuminate\Http\Requests\StorePostReqoest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request) {
        // The incoming request is valid....
        $user_id = Auth::user()->id;
        $slug = Str::of($request->post('title'))->slug('-')->value();
        $request->merge(['slug' => $slug, 'user_id' => $user_id]);
        $post = Post::create($request->all());
        return $post;
    }
}
