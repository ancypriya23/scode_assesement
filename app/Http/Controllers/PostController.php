<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;  // Correct import for the Request class

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PostResource::collection(Post::paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): PostResource
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => 1,
        ]);
        
        $post->user->notify(new PostCreated($post));

        return new PostResource($post);
    }

    public function storeManual(Request $request)
    {
        
        // 1. Validate the request, including the image file
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max size: 2MB
        ]);

        // 2. Handle the file upload
        if ($request->hasFile('image')) {
            // Store the file in the 'public' disk (storage/app/public)
            //$filePath = $request->file('image')->store('posts', 's3');
            $filePath = $request->file('image')->store('posts', 'public');
        }

        // 3. Create the Post with the uploaded image's path
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filePath ?? null,
            'user_id' => 1,
        ]);
dd('stored');
        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $post->update($request->all());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): \Illuminate\Http\JsonResponse
    {
        $post->delete();
        return response()->json('Post deleted successfully');
    }

    public function destroyManual(Post $post)
{
    // Delete the image from the storage if it exists
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }

    // Delete the post
    $post->delete();

    return redirect()->route('posts.index')
                     ->with('success', 'Post and associated image deleted successfully!');
}
}
