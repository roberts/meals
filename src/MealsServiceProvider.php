<?php

declare(strict_types=1);

namespace Roberts\Meals;

use Tipoff\Support\TipoffPackage;
use Tipoff\Support\TipoffServiceProvider;

class MealsServiceProvider extends TipoffServiceProvider
{
    public function configureTipoffPackage(TipoffPackage $package): void
    {
        $package
            ->name('meals')
            ->hasConfigFile();
    }
}
