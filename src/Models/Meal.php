<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class Meal extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;
    use SoftDeletes;

    protected $with = [
        'categories'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($meal) {
            if (empty($meal->title)) {
                throw new \Exception('A meal must have a unique title.');
            }
            if (empty($meal->name)) {
                $meal->name = $meal->title;
            }
            if (empty($meal->price)) {
                $meal->price = 1499;
            }
            if (empty($meal->servings)) {
                $meal->servings = 2;
            }
        });
    }

    public function image()
    {
        return $this->belongsTo(\DrewRoberts\Media\Models\Image::class);
    }

    public function package_image()
    {
        return $this->belongsTo(\DrewRoberts\Media\Models\Image::class, 'package_image_id');
    }

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class)->withTimestamps();
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(MenuCategory::class)->withTimestamps();
    }
}
