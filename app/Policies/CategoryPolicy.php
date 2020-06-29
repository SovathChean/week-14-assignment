<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;



    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function createCategory(User $user)
    {
      return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return mixed
     */
    public function editCategory(User $user, Category $category)
    {
        //
          return $user->role === 'admin';
    }
    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return mixed
     */
    public function updateCategory(User $user, Category $category)
    {
        //
          return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return mixed
     */
    public function deleteCategory(User $user, Category $category)
    {
        //
          return $user->role === 'admin';
    }


    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return mixed
     */
    public function ajaxDeleteCategory(User $user, Category $category)
    {
        //
        return $user->role === 'admin';
    }
}
