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

    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
