<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\Menu;
use Tipoff\Support\Contracts\Models\UserInterface;

class MenuPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view menus') ? true : false;
    }

    public function view(UserInterface $user, Menu $menu): bool
    {
        return $user->hasPermissionTo('view menus') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create menus') ? true : false;
    }

    public function update(UserInterface $user, Menu $menu): bool
    {
        return $user->hasPermissionTo('update menus') ? true : false;
    }

    public function delete(UserInterface $user, Menu $menu): bool
    {
        return false;
    }

    public function restore(UserInterface $user, Menu $menu): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, Menu $menu): bool
    {
        return false;
    }
}
