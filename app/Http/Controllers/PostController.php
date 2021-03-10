<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang = "laravel")
    {
       $result = Post::with('user')->orderBy('created_at', 'desc')->where('sujet',$lang)->get();
       return view('welcome',['posts'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth()->user()->id;
        $date = date('Y-m-d H:i:s');

        $post = Post::create([
            'content' => $request->content,
            'remember_token' => $request->_token,
            'sujet' => $request->sujet,
            'id_user' => $id,
            'content' => $request->content,
            'important' => '0',
            'unimportant' => '0',
            'created_at' =>$date,

        ]);

        if($post){
                return redirect()->to('/');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
