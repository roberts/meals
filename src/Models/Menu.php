<?php

declare(strict_types=1);

namespace Roberts\Meals\Models;

use Tipoff\Support\Models\BaseModel;
use Tipoff\Support\Traits\HasCreator;
use Tipoff\Support\Traits\HasPackageFactory;
use Tipoff\Support\Traits\HasUpdater;

class Menu extends BaseModel
{
    use HasCreator;
    use HasPackageFactory;
    use HasUpdater;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($menu) {
            if (empty($menu->name)) {
                throw new \Exception('A menu must have a unique name.');
            }
        });
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withTimestamps();
    }

    public function categories()
    {
        return $this->hasManyDeep('App\Models\MenuCategory', ['meal_menu', 'App\Models\Meal', 'meal_menu_category']);
    }
}
