<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\CommentCollection;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json([
            'success' => true, 'data' => new CommentCollection($comments)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'body' => 'required',
            'post_id' => 'required',
            'user_id' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
            'error' => $validator->errors()
        ], 200);      
        }
        
        $comment = Comment::create($input);
        return response()->json([
            'success' => true, 'data'=> new CommentResource($comment)
        ], 200); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment, $id)
    {
        $comment = Comment::find($id);
        if (is_null($comment)) {
            return response()->json([
            'error' => 'Comment does not exist.'
        ], 200); 
        }
        return response()->json([
            'success' => true, 'data'=> new CommentResource($comment)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
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
        
        
        $comment->body = $input['body'];
        $comment->post_id = $input['post_id'];
        $comment->user_id = $input['user_id'];
        $comment->save();
        
        return response()->json([
            'success' => true, 'data'=> new CommentResource($comment)
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'success' => true, 'Message'=> 'Comments Deleted'
        ], 200);
    }
}
