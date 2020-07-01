<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller implements ShouldQueue
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();

        $comment = Comment::create($input);
        $post = Post::findOrFail($comment->post->id);

        //sent to admin
        $detail = [
         'title' => 'Anonymous comment',
         'body' => 'there is an anonymous comment from '. $input['name']
         ];


         $users = User::where('role', 'admin')->get();

         foreach($users as $user){
            Mail::to($user->email)->queue(new \App\Mail\CommentMail($detail));
        //  dd($user->email);
         }


         // //sent to editor
         Mail::to($post->user->email)->queue(new \App\Mail\CommentMail($detail));
         //dd($post->user->email);
        return redirect(route('post.show', $comment->post));
    }



}
