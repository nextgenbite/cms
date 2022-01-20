<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Photo;

class FrontEndController extends Controller
{
    public function index(){
        $latest_post = Post::latest()->take(1)->get();
        $post_latest = Post::latest()->paginate(4);
       
      
       
        //$categories_post_views = post::orderBy('view_count', 'DESC')->take(5)->get();
      return view('welcome', compact('latest_post',  'post_latest'));
    }
    public function layoutsindex(){

        $categories = Category::all();
        return view('layouts.blog-home', compact('categories'));

    }
       
}
