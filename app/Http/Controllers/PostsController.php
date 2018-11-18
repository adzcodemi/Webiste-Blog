<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 || $tags->count() == 0){

            Session::flash('info','You must have some categories and  tags before attempting to create post.');
            return redirect()->back();
        }

        return  view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

             //dd($request->all());

        $this->validate($request,[

               'title'=>'required|max:255',
               'content'=>'required',
               'featured'=>'required|image',
               'category_id'=>'required',
               'tags'=>'required'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $user = Auth::user();
        $post = Post::create([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'content'=>$request->content,
            'user_id'=>$user->id,
            'slug'=> str_slug($request->title),
            'featured'=>'uploads/posts/'.$featured_new_name
        ]);

        $post->tags()->attach($request->tags);
        Session::flash('success','You successfully added posts.');
        return redirect()->route('posts');
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
        //

        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

             $this->validate($request,[
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id'=>'required'
            ]);      
            $post = Post::find($id);

            if($request->hasFile('featured')){
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();
                $featured->move('uploads/posts',$featured_new_name);
                $post->featured = 'uploads/posts/'.$featured_new_name;
            }
            $user = Auth::user();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->user_id = $user->id;
            $post->save();
            $post->tags()->sync($request->tags);
            Session::flash('success','You successfully update post.');
            return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','You successfully trashed post.');
        return redirect()->route('posts');
    }


    /**
     * Restore the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $post= Post::withTrashed()->where('id',$id)->get()->first();
        $post->restore();
        Session::flash('success','You successfully restored trashed post.');
        return redirect()->back();
    }

    /**
     * Display a Trashed listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    /**
     * Permanent Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function kill($id){

        $post= Post::withTrashed()->where('id',$id)->get()->first();
        $post->forceDelete();

        Session::flash('success','You successfully permanent deleted post.');
        return redirect()->back();
    }
}
