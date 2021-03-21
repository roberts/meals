<?php

declare(strict_types=1);

namespace Roberts\Meals\Tests;

use Laravel\Nova\NovaCoreServiceProvider;
use Roberts\Meals\MealsServiceProvider;
use Tipoff\Support\SupportServiceProvider;
use Tipoff\TestSupport\BaseTestCase;
use Tipoff\TestSupport\Providers\NovaPackageServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            NovaCoreServiceProvider::class,
            NovaTestbenchServiceProvider::class,
            MealsServiceProvider::class,
            SupportServiceProvider::class,
        ];
    }
}
