<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Category;
use App\Post;
//use App\Comment;


class AdminController extends Controller
{
    //
    public function index(){


         $postsCount = Post::count();
        // $categoriesCount = Category::count();
        // $commentsCount = Comment::count();
//compact('postsCount','categoriesCount','commentsCount')

        return view('admin/index', );

    }
}
