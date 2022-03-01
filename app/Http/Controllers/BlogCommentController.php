<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogComment = BlogComment::all()->toArray();
        return array_reverse($blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $userID = auth()->user()->id;
        $blogComment = new BlogComment([
            'user_id' => $userID,
            'blog_id' => $id, 
            'comment' => $request->comment,
        ]);

        $blogComment->save();

        $response = [
            'comment' => $blogComment,
            'message' => 'success',
        ];
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $blogComment)
    {
        $blogComment = BlogComment::all();

        $response = [
            'all comment' => $blogComment
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blogComment = BlogComment::find($id);
        $response = [
            'comment' => $blogComment
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogComment $blogComment)
    {
        //
        $blogComment = BlogComment::find($id)->update($request->all());
        // $job->update($request->all());

        return response()->json('The comment successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
        $blogComment = BlogComment::find($id);
        $blog->delete();

        return response()->json('The comment successfully deleted');
    }
}
