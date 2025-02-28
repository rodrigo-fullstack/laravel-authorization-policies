<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function before(User $user){
        if($user->permissions->contains('permission', 'all')){
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return $user->role === 'admin' || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {

        // get info from db v1
        // return $user->permissions()->where('permission', 'create_post')->exists();

        // get info from db v2
        // return $user->permissions->contains('permission', 'create_post');

        // get info from session (best performance)
        foreach(auth()->user()->permissions as $permission){
            if($permission['permission'] === 'create_post') 
                return Response::allow();
        }
        return Response::denyWithStatus(403, 'Not Authorized', 403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return true;
    }
}
