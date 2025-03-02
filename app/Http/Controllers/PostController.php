<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        // $post = DB::select('select * from posts;');
        //     dd($post);
        //query builder
        // $post = DB::select('select * from posts where id =:id',
        // ['id'=>1]);
        // dd($post);

        $post = DB::table(('posts'))
                                    ->where('created_at', '<',now()->subDay())
                                    ->orWhere('id','>','0')
                                    ->whereBetween('id',[1,2])
                                    ->orderBy('id','desc')
                                    ->get();
                                    // ->insert([
                                    //     'title'=>'new post',
                                    //     'body'=>'new body',
                                    //     'created_at'=>now(),
                                    // ]);

        // dd($post);
        return view('post.speech', compact('post'));
    }
}
