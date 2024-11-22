<?php

namespace App\Policies;

use App\Models\Groups;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GroupsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Groups $groups): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $roleJson = $user->group->permissions;
        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);
            $check = isRole($roleArr, 'groups', 'add');
            return $check;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Groups $group): bool
    {
        return $user->id === $group->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Groups $group): bool
    {
        return $user->id === $group->user_id;
    }

    /**
     * Determine whether the user can permission the model.
     */
    public function permission(User $user, Groups $group): bool
    {
        // dd($user);
        return ($user->id === $group->user_id || $user->user_id == 0);
        // return ($user->id === $group->user_id || $group->user_id == $user->user_id);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Groups $group): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Groups $group): bool
    {
        //
    }

    
}
