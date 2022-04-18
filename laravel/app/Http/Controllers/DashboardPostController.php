<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.posts.create', [
           'categories' => Category::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required | max:255',
            'slug' => 'required | unique:posts',
            'category_id' => 'required',
            'address' => 'required | max:355',
            'image' => 'image|file|max:1024',
            'thumb1' => 'image|file|max:1024',
            'thumb2' => 'image|file|max:1024',
            'thumb3' => 'image|file|max:1024',
            'thumb4' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        // ---image null / get unsplash random image---------
        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        if($request->file('thumb1')) {
            $validateData['thumb1'] = $request->file('thumb1')->store('post-images');
        } 
        if($request->file('thumb2')) {
            $validateData['thumb2'] = $request->file('thumb2')->store('post-images');
        } 
        if($request->file('thumb3')) {
            $validateData['thumb3'] = $request->file('thumb3')->store('post-images');
        } 
        if($request->file('thumb4')) {
            $validateData['thumb4'] = $request->file('thumb4')->store('post-images');
        } 


        $validateData['user_id'] = auth()->user()->id;
        // $validateData['adress'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required | max:255',
            'category_id' => 'required',
            'address' => 'required | max:355',
            'image' => 'image|file|max:1024',
            'thumb1' => 'image|file|max:1024',
            'thumb2' => 'image|file|max:1024',
            'thumb3' => 'image|file|max:1024',
            'thumb4' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required | unique:posts';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }
        if($request->file('thumb1')) {
            if($request->oldThumb1) {
                Storage::delete($request->oldThumb1);
            }
            $validateData['thumb1'] = $request->file('thumb1')->store('post-images');
        }
        if($request->file('thumb2')) {
            if($request->oldThumb2) {
                Storage::delete($request->oldThumb2);
            }
            $validateData['thumb2'] = $request->file('thumb2')->store('post-images');
        }
        if($request->file('thumb3')) {
            if($request->oldThumb3) {
                Storage::delete($request->oldThumb3);
            }
            $validateData['thumb3'] = $request->file('thumb3')->store('post-images');
        }
        if($request->file('thumb4')) {
            if($request->oldThumb4) {
                Storage::delete($request->oldThumb4);
            }
            $validateData['thumb4'] = $request->file('thumb4')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Post::where('id', $post->id)
              ->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // -----delete file-----
        if($post->image) {
            Storage::delete($post->image);
        }
        //  ----delete in tables-----
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request) {
       $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
       return response()->json(['slug' => $slug]);
    }
}
