<?php
namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Bypass all permissions in Policy.
     * Ultrapassa todas as permissões em Policies
     * @param \App\Models\User $user
     * @return bool|null
     */
    public function before(User $user)
    {
        if ($user->permissions->contains('permission', 'all')) {
            return true;
        }

        return null;
    }

    /**
     * Verifica quando o usuário pode ver todas as views
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Verifica quando o usuário pode ver o post.
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return $user->role === 'admin' || $user->id === $post->user_id;
    }

    /**
     * Verifica se o usuário pode criar posts.
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {

        // --------------------
        // Get info from db v1.
        // Buscar informações no banco de dados v1.
        // return $user->permissions()->where('permission', 'create_post')->exists();
        // --------------------

        // --------------------
        // Get info from db v2
        // Buscar informações no banco de dados v2
        // return $user->permissions->contains('permission', 'create_post');
        // --------------------

        // --------------------
        // Get info from session (best performance).
        // Buscar informações da sessão (melhor desempenho)
        // --------------------

        foreach (auth()->user()->permissions as $permission) {
            if ($permission['permission'] === 'create_post') {
                return Response::allow();
            }

        }
        return Response::denyWithStatus(403, 'Not Authorized', 403);
    }

    /**
     * Verifica se o usuário pode atualizar um post.
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    /**
     * Verifica se um usuário pode deletar um post.
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Verifica se o usuário pode restaurar um post
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Verifica se o usuário pode permanentemente deletar o post.
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return true;
    }
}
