<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function viewuserdetail($id){
        $data2 = User::where('id',$id)->get();
        $data3 = Profile::where('user_id',$id)->get();
        return view('user.userdetail', compact('data2','data3'));
    }

    public function viewdetail($id){
        $data = Comment::where('user_id',$id)->get();
        $data1 = Post::where('user_id',$id)->get();
        $data2 = User::where('id',$id)->get();
        $data3 = Profile::where('user_id',$id)->get();

        return view('user.showall', compact('data','data1','data2','data3'));
    }


    public function index()
    {
        $data = User::get();
        // return $data;
        return view('user.show', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('user.add');
    // return  "addd";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $name = $request->name;
        $email=$request->email;
        $password=$request->password;
        $age=$request->age;
        $birthday=$request->birthday;


        $user = new User();
        $user->name = $name;
        $user->email= $email;
        $user->password = $password;
        $user->age =$age;
        $user->birthday =$birthday;
        $user->save();
        return redirect()->route('user.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.userdetails', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', '=', $id)->first();
        return view('users.edituser', compact('data'));
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
                'name' => 'required',
                'email'=> 'required|email',
                'password'=>'required',
            ]);
            $id = $request->id;
            $name = $request -> name;
            $email = $request -> email;
            $password = $request -> password;
            User::where('id', '=', $id)->update([
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ]);


            return redirect()->back()->with('success', 'User edit sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id','=',$id )->delete();
        return redirect()->back()->with('success', 'User delete sucessfully');
    }
    public function redirectRoute(){
        return redirect()->to('/listuser');
    }
}
