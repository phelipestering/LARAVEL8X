<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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


        $data = $request->all();

       if ($request->image->isValid()){

            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;

       }

       post::create($data);

       return redirect()
                ->route('posts.index')
                ->with('message', 'Post criado com sucesso');
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

        if  (Storage::exists($post->image))
        Storage::delete($post->image);

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

        $data = $request->all();


       if ($request->image->isValid()){

        if(Storage::exists($post->image))
            Storage::delete($post->image);

        $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();

        $image = $request->image->storeAs('posts', $nameFile);
        $data['image'] = $image;

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
