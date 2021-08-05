<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\Authors as AuthorsResource;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authers = Author::all();
        return response()->json([
            'success' => true, 'data' => $authers
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
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|unique:authors',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
            'error' => $validator->errors()
        ], 200);      
        }
        
        $authors = Author::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        return response()->json([
            'success' => true, 'data'=> new AuthorsResource($authors)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author, $id)
    {
        $author = Author::find($id);
        if (is_null($author)) {
            return response()->json([
            'error' => 'author does not exist.'
        ], 200); 
        }
        return response()->json([
            'success' => true, 'data'=> new AuthorsResource($author)
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|unique:authors',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
            'error' => $validator->errors()
			], 200);      
        }
        
        $author->title = $input['name'];
        $author->email = $input['email'];
        $author->password = $input['password'];
        $author->save();
        
        return response()->json([
            'success' => true, 'data'=> new AuthorsResource($author)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json([
            'success' => true, 'Message'=> 'Author Deleted'
        ], 200);
    }
}
