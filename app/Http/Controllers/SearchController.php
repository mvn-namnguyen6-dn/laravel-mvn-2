<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $data = User::where('name','LIKE','%'.$search_text.'%')->paginate(5);
            $data->appends($request->all());
            return view('user.search',compact('data'));
        }else{
            return view('user.show');

        }
    }


}

//     public function searchDataPost(Request $request)
//     {
//         if(isset($_GET['query'])){
//         $users = User::with('posts', 'comments')->get();
//         $data = $_GET['query'];

//         foreach ($users as $user_key => $user_value) {
//             if (count($user_value->posts) ==   $data) {
//                 $data[$user_key] = $user_value;
//             }
//         }
//         return view('user.search',compact('data'));
//     }else{
//         return view('user.show');

//     }
//     }
//     public function searchDataComment(Request $request)
//     {
//         $users = User::with('posts', 'comments')->get();
//         $data = [];
//         $count = $request->all();
//         foreach ($users as $user_key => $user_value) {
//             if (count($user_value->comments) == ($count['count'])) {
//                 $data[$user_key] = $user_value;
//             }
//         }
//         return view('user.search',compact('data'));
//     }
// }
