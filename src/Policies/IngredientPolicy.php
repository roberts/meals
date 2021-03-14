<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\Ingredient;
use Tipoff\Support\Contracts\Models\UserInterface;

class IngredientPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view ingredients') ? true : false;
    }

    public function view(UserInterface $user, Ingredient $ingredient): bool
    {
        return $user->hasPermissionTo('view ingredients') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create ingredients') ? true : false;
    }

    public function update(UserInterface $user, Ingredient $ingredient): bool
    {
        return $user->hasPermissionTo('update ingredients') ? true : false;
    }

    public function delete(UserInterface $user, Ingredient $ingredient): bool
    {
        return false;
    }

    public function restore(UserInterface $user, Ingredient $ingredient): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, Ingredient $ingredient): bool
    {
        return false;
    }
}
