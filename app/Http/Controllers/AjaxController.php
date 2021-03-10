<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class AjaxController extends Controller
{
    public function ajaxRequestPost(Request $request)
    {

        $input = $request->comment;
        return response()->json(['success'=>$input]);

    }
}
