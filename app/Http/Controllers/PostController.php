<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

         $posts = post::get();



        return view('admin.posts.index', compact('posts'));

    }


    public function create(){


       return view('admin.posts.create');

   }

   public function store(StoreUpdatePost $request){


       $post = post::create($request->all());

       return redirect()->route('posts.index');

   }

   public function show($id){

    // $post = post::where ('id', $id)-> first();

   if  (!$post = post::find($id)){
        return redirect()->route('posts.index');

   }

   

    return view ('admin.posts.show', compact ('post'));

}
}
