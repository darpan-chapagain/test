<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all()->toArray();
        return array_reverse($blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = auth()->user()->id;
        // if($request->hasFile('post_thumb')){
        //     $image1=$request->file('post_thumb');
        //     $reThumbImage=time().'.'.$image1->getClientOriginalExtension();
        //     $dest1=public_path('/imgs/thumb');
        //     $image1->move($dest1,$reThumbImage);
        // }else{
        //     $reThumbImage='na';
        // }

        // // Post Full Image
        // if($request->hasFile('post_image')){
        //     $image2=$request->file('post_image');
        //     $reFullImage=time().'.'.$image2->getClientOriginalExtension();
        //     $dest2=public_path('/imgs/full');
        //     $image2->move($dest2,$reFullImage);
        // }else{
        //     $reFullImage='na';
        // }
        $blog = new Blog([
            'user_id' => $userID,
            'title' => $request->title,
            // 'thumb' => $reThumbImage,
            // 'full_img' => $reThumbImage,
            'detail' => $request->detail, 
            'tags' => $request->tags,
        ]);
        $blog->save();

        $response = [
            'blog' => $blog,
            'message' => 'success',
        ];
        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $blog = Blog::all();

        $response = [
            'all blogs' => $blog
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        $response = [
            'blog' => $blog
        ];
        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id)->update($request->all());
        // $job->update($request->all());

        return response()->json('The post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return response()->json('The blog successfully deleted');
    }

    public function myBlog()
    {
        $userID = auth()->user()->id;
        $blog = Blog::all()->where('user_id', $userID);
        $response = [
            'blog' => $blog
        ];
        return response()->json($response);
    }

    public function getUserBlog($id){
        $user = User::all()->where('id', $id)->first();
        $blog = $user->blogs;
        $response = [
            'blog' => $blog
        ];
        return response()->json($response);
    }

    public function userBlog($id){
        $blog = Blog::all()->where('user_id', $id);
        $response = [
            'blog' => $blog
        ];
        return response()->json($response);
    }
}
