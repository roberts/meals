<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\Meal;
use Tipoff\Support\Contracts\Models\UserInterface;

class MealPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view meals') ? true : false;
    }

    public function view(UserInterface $user, Meal $meal): bool
    {
        return $user->hasPermissionTo('view meals') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create meals') ? true : false;
    }

    public function update(UserInterface $user, Meal $meal): bool
    {
        return $user->hasPermissionTo('update meals') ? true : false;
    }

    public function delete(UserInterface $user, Meal $meal): bool
    {
        return false;
    }

    public function restore(UserInterface $user, Meal $meal): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, Meal $meal): bool
    {
        return false;
    }
}
