<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;

class Ingredient extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}
