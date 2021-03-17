<?php

namespace Roberts\Meals\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class MenuChange extends BaseResource
{
    public static $model = \Roberts\Meals\Models\MenuChange::class;

    public static $title = 'id';

    public static $search = [
        'id',
    ];

    public static $group = 'Operations';

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            new Panel('Data Fields', $this->dataFields()),
        ];
    }

    protected function dataFields(): array
    {
        return array_merge(
            parent::dataFields(),
            $this->creatorDataFields(),
            $this->updaterDataFields(),
        );
    }
}
