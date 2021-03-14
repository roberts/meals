<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\MenuChange;
use Tipoff\Support\Contracts\Models\UserInterface;

class MenuChangePolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view menu changes') ? true : false;
    }

    public function view(UserInterface $user, MenuChange $menuChange): bool
    {
        return $user->hasPermissionTo('view menu changes') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create menu changes') ? true : false;
    }

    public function update(UserInterface $user, MenuChange $menuChange): bool
    {
        return $user->hasPermissionTo('update menu changes') ? true : false;
    }

    public function delete(UserInterface $user, MenuChange $menuChange): bool
    {
        return false;
    }

    public function restore(UserInterface $user, MenuChange $menuChange): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, MenuChange $menuChange): bool
    {
        return false;
    }
}
