<?php

namespace Roberts\Meals\Nova;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class Menu extends BaseResource
{
    public static $model = \Roberts\Meals\Models\Menu::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    public static $group = 'Ecommerce Items';

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->when(empty($request->get('orderByDirection')), function (Builder $query) {
            $query->getQuery()->orders = [];

            return $query->orderBy('id', 'asc');
        });
    }

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->sortable(),
            Boolean::make('Active', 'is_active')->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Name')->required(),
            Boolean::make('Active', 'is_active')->exceptOnForms(),

            BelongsToMany::make('Meals'),

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
