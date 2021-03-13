<?php

declare(strict_types=1);

namespace Roberts\Meals\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Roberts\Meals\Models\Allergen;
use Tipoff\Support\Contracts\Models\UserInterface;

class AllergenPolicy
{
    use HandlesAuthorization;

    public function viewAny(UserInterface $user): bool
    {
        return $user->hasPermissionTo('view allergens') ? true : false;
    }

    public function view(UserInterface $user, Allergen $allergen): bool
    {
        return $user->hasPermissionTo('view allergens') ? true : false;
    }

    public function create(UserInterface $user): bool
    {
        return $user->hasPermissionTo('create allergens') ? true : false;
    }

    public function update(UserInterface $user, Allergen $allergen): bool
    {
        return $user->hasPermissionTo('update allergens') ? true : false;
    }

    public function delete(UserInterface $user, Allergen $allergen): bool
    {
        return false;
    }

    public function restore(UserInterface $user, Allergen $allergen): bool
    {
        return false;
    }

    public function forceDelete(UserInterface $user, Allergen $allergen): bool
    {
        return false;
    }
}
