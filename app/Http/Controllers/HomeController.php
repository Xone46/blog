<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($lang = "laravel")
    {
       $result = Post::with('user')->orderBy('created_at', 'desc')->where('sujet',$lang)->get();
       return view('/home',['posts'=>$result]);
    }
}
