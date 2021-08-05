<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\Post as PostResource;
use Validator;
use App\Http\Resources\PostCollection;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function index(): JsonResponse
    {
        $blogs = Post::all();
        return response()->json([
            'success' => true,'data' => new PostCollection($blogs)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
   

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function show($id)
    {
        $blog = Post::find($id);
        if (is_null($blog)) {
            return response()->json([
            'error' => 'Post does not exist.'
        ], 200); 
        }
        return response()->json([
            'success' => true, 'data'=> new PostResource($blog)
        ], 200); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'body' => 'required',
            'author_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
            'error' => $validator->errors()
        ], 200);      
        }
        $blog = Post::create($input);
        return response()->json([
            'success' => true, 'data'=> new PostResource($blog)
        ], 200); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Post $post
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function update(Request $request, Post $post)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
            'error' => $validator->errors()
			], 200);      
        }
        
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->author_id = $input['author_id'];
        $post->save();
        
        return response()->json([
            'success' => true, 'data'=> new PostResource($post)
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @noinspection ReturnTypeCanBeDeclaredInspection
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'success' => true, 'Message'=> 'Past Deleted'
        ], 200); 
    }
}
