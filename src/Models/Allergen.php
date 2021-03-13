<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;

class Allergen extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;

    public function users()
    {
        return $this->belongsToMany(app('user'))->withTimestamps();
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withTimestamps();
    }

    public function icon()
    {
        return $this->belongsTo(app('image'), 'icon_id');
    }

    public function image()
    {
        return $this->belongsTo(app('image'));
    }
}
