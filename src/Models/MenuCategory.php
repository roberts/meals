<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class MenuCategory extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
            if (empty($category->title)) {
                throw new \Exception('A category must have a unique title.');
            }
            if (empty($category->priority)) {
                $category->priority = 10; // A higher priority shows the category higher on the menu page, a priority of 1 shows the room on the bottom of the menu page.
            }
        });
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withTimestamps();
    }

    public function image()
    {
        return $this->belongsTo(\DrewRoberts\Media\Models\Image::class);
    }
}
