<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){
        $items = Comment::orderBy('created_at', 'desc')->paginate(4);

        
        return view('welcome', [
            'items' => $items
        ]);

    }

    public function store(Request $request)
    {
        $name = $request->name;
        $ucapan = $request->ucapan;


        $items = Comment::create([
            'name' => $name,
            'comment' => $ucapan,
        ]);

        return redirect()->route('welcome');
    }
}
