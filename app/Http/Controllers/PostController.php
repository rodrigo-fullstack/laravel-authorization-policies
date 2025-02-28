<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts(){
        $posts = Post::with('user')->get();
            
        return view('home', compact('posts'));
    }
    
    public function update($id){
        $post = Post::find($id);
        
        if(Auth()->user()->can('update', $post)){
            echo "I will update the post id: $id";
            
        } else{
            echo "I can't update the post id: $id";
            
        }
        // return view('home', compact('posts'));
    }

    public function delete($id){
        $post = Post::find($id);

        if(Auth()->user()->can('delete', $post)){
            echo "I will delete the post id: $id";
            
        } else{
            echo "I can't delete the post id: $id";
            
        }
            
        // return view('home', compact('posts'));
    }

    public function create(){
        // needs to pass the model class to identify its Policy
        if(Auth()->user()->can('create', Post::class)){
            echo "I will create a new post";
            
        } else{
            echo "I can't create a new post";
            
        }
            
        // return view('home', compact('posts'));
    }
}
