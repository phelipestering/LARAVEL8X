<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

         $posts = post::latest()->paginate();

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

    public function destroy ($id){
        if  (!$post = post::find($id))

        return redirect()->route('posts.index');

        $post->delete();

        return redirect()->route('posts.index');

    }

    public function edit($id){

        if  (!$post = post::find($id)){
            return redirect()->back();

        }
        return view ('admin.posts.edit', compact ('post'));
    }

    public function update(StoreUpdatePost $request, $id){
        if ( !$post=post::find($id)) {
            return redirect()->back();
        }

        $post -> update($request->all());

        return redirect()
            ->route('posts.index')
            ->with('message', 'Post Atualizado com Sucesso');

    }

    public function search(Request $request){

        $filters = $request ->except('_token');

        $posts = post::where('title', '=', $request->search)
                        ->orWhere('content', 'LIKE',"%{$request->search}%")
                        ->paginate();

        return view ('admin.posts.index', compact ('posts', 'filters'));


    }

}
