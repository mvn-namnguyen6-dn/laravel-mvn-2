<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::get();

        return view('post.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $content=$request->content;
        $user_id = Auth::user()->id;
        $post = new Post();
        $post->title = $title;
        $post->content= $content;
        $post->user_id = $user_id;
        $post->save();
        return redirect()->back()->with('success', 'Post add sucessfully');
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
    public function edit($id)
    {
        $data = Post::where('id', '=', $id)->first();
        return view('post.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request ->validate([
            'title' => 'required',
            'content'=> 'required',

        ]);
        $id = $request->id;
        $title = $request -> title;
        $content = $request -> content;

        Post::where('id', '=', $id)->update([
            'title'=>$title,
            'content'=>$content,
        ]);
        return redirect()->back()->with('success', 'Post edit sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id','=',$id )->delete();
        return redirect()->back()->with('success', 'User delete sucessfully');
    }

    public function redirectRoute(){
        return redirect()->to('/showpost');
    }
}
