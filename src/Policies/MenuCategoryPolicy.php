<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\MenuCategory;
use Tipoff\Support\Contracts\Models\UserInterface;

class MenuCategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view menu categories') ? true : false;
    }

    public function view(UserInterface $user, MenuCategory $menuCategory): bool
    {
        return $user->hasPermissionTo('view menu categories') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create menu categories') ? true : false;
    }

    public function update(UserInterface $user, MenuCategory $menuCategory): bool
    {
        return $user->hasPermissionTo('update menu categories') ? true : false;
    }

    public function delete(UserInterface $user, MenuCategory $menuCategory): bool
    {
        return false;
    }

    public function restore(UserInterface $user, MenuCategory $menuCategory): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, MenuCategory $menuCategory): bool
    {
        return false;
    }
}
