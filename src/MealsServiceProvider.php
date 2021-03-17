<?php

declare(strict_types=1);

namespace Roberts\Meals;

use Roberts\Meals\Models\Allergen;
use Roberts\Meals\Models\Ingredient;
use Roberts\Meals\Models\Meal;
use Roberts\Meals\Models\Menu;
use Roberts\Meals\Models\MenuCategory;
use Roberts\Meals\Models\MenuChange;
use Roberts\Meals\Policies\AllergenPolicy;
use Roberts\Meals\Policies\IngredientPolicy;
use Roberts\Meals\Policies\MealPolicy;
use Roberts\Meals\Policies\MenuCategoryPolicy;
use Roberts\Meals\Policies\MenuChangePolicy;
use Roberts\Meals\Policies\MenuPolicy;
use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class MealsServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->hasPolicies([
                Allergen::class => AllergenPolicy::class,
                Ingredient::class => IngredientPolicy::class,
                Meal::class => MealPolicy::class,
                Menu::class => MenuPolicy::class,
                MenuCategory::class => MenuCategoryPolicy::class,
                MenuChange::class => MenuChangePolicy::class,
            ])
            ->hasNovaResources([
                \Roberts\Meals\Nova\Allergen::class,
                \Roberts\Meals\Nova\Ingredient::class,
                \Roberts\Meals\Nova\Meal::class,
                \Roberts\Meals\Nova\Menu::class,
                \Roberts\Meals\Nova\MenuCategory::class,
                \Roberts\Meals\Nova\MenuChange::class,
            ])
            ->name('meals')
            ->hasConfigFile();
    }
}
