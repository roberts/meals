<?php

namespace Roberts\Meals\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Tipoff\Support\Nova\BaseResource;

class Ingredient extends BaseResource
{
    public static $model = \Roberts\Meals\Ingredient::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public static $group = 'Operations';

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
        ];
    }

    protected function dataFields(): array
    {
        return array_merge(
            parent::dataFields(),
            $this->creatorDataFields(),
        );
    }
}
