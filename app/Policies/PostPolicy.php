<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function editPost(User $user, Post $post)
    {
        //
        return $user->id === $post->creator_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function updatePost(User $user, Post $post)
    {
        //
        return $user->id === $post->creator_id || $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function deletePost(User $user, Post $post)
    {
        //
        return $user->id === $post->creator_id || $user->role === 'admin';
    }



    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return mixed
     */
    public function ajaxDeletePost(User $user, Post $post)
    {
        return $user->id === $post->creator_id || $user->role === 'admin';
    }
}
