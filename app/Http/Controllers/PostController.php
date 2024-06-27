<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Termwind\Components\Dd;
use App\Models\post;
use App\Models\User;
use Illuminate\Validation\Rules\Exists;

class PostController extends Controller
{
    public function index(){
        $rowsFromDB = Post::all();
        return(view('posts.index',['posts' =>$rowsFromDB]));
    }


    public function show(Post $post){
        // $postFromDB = post::findorfail($post_id);
        
        return view('posts.show',['post'=> $post]);

    }
    

    public function create(){
        $users = User::all();
        // dd($users);
        return view('posts.create',['users' => $users]);
    }


    public function store(Request $request){
        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required' , 'min:5'],
            'creator' =>['required', 'exists:users,id']
        ]);
        $post = new Post;
        $post-> title = request()-> title;
        $post-> description = request()-> description;
        $post ->user_id = request()->creator;
        // dd(request()-> description);
        $post->save();
        return to_route('posts.index');
    }

    public function edit(post $post){
        $users = User::all();
        return view('posts.edit',[
            'users' => $users,
            'post' => $post
    ]);
    }

    public function update(Request $request , $post_id){
        $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required' , 'min:5'],
            'creator' =>['required', 'exists:users,id']
        ]);
        $post = Post::findOrFail($post_id);
        $post->update([
            'title'=> request()-> title,
            'description'=> request()-> description,
            'user_id'=> request()-> creator
        ]);
        // return $data;

        return to_route('posts.show',$post->id);
    }

    public function destroy($post_id){
        $post = Post::findOrFail($post_id);
        $post->delete();
        return to_route('posts.index');
    }
}
