<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(3);
        // dd($posts);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = new Post();
        $post['title'] = $request->title;
        $post['description'] = $request->description;
        $post['category_id'] = $request->category;
        // $post['user_id'] = auth()->user()->id;

        // dd($request->tag);
        if($request->photo)
        {
            $fileName = 'post_' . date('Ymd_his') . rand(10, 10000) . '.' . $request->photo->extension();
            $request->photo->storeAs('/photos/posts', $fileName, 'public');
            $post['photo'] = '/storage/photos/posts/' . $fileName;
            // dd($post->photo);
        }
        $post->save();

        $post->tags()->attach($request->tag);

        return redirect('admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $selected_tags = [];
        foreach($post->tags as $tag)
        {
            array_push($selected_tags, $tag->pivot->tag_id);
        }
        return view('admin.post.create', compact('post', 'tags', 'categories', 'selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        // dd($request, $post);

        $post['title'] = $request->title;
        $post['description'] = $request->description;
        $post['category_id'] = $request->category;

        // dd($request->tag);
        if($request->photo)
        {
            @unlink(public_path() . '/' . $post->photo);
            $fileName = 'post_' . date('Ymd_his') . rand(10, 10000) . '.' . $request->photo->extension();
            $request->photo->storeAs('/photos/posts', $fileName, 'public');
            $post['photo'] = '/storage/photos/posts/' . $fileName;
            // dd($post->photo);
        }
        $post->save();

        // $post->tags()->sync($request->tag);

        $post->tags()->detach();
        $post->tags()->attach($request->tag);

        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        @unlink(public_path() . '/' . $post->photo);
        $post->delete();
        return redirect('admin/post');
    }
}
