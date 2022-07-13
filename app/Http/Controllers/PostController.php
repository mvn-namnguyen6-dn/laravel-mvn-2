<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function viewpost($id){
        // $data = User::where('id', $id)->with('posts')->get();

        $data = Post::where('user_id',$id)->get();
        // dd($data)->array();
        // return $data;
        return view('user.showpost', compact('data'));
     }
    public function index()
    {
        if (Auth::user()->cannot('viewAny', Post::class)) {
            return view('post.add');
        }
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

        if (Auth::user()->cannot('create', Post::class)) {
            abort(403);
        }
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
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
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
    public function detail($id){
        $data = Post::where('id', '=', $id)->first();
        return view('post.detail', compact('data'));
    }
    public function redirectRoute(){
        return redirect()->to('/showpost');
    }
}
