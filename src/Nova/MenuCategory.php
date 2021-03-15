<?php

namespace Roberts\Meals\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class MenuCategory extends BaseResource
{
    public static $model = \Roberts\Meals\Models\MenuCategory::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'slug',
        'title',
    ];

    public static $group = 'Operations';

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')->sortable(),
            Text::make('Title')->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Title')->required(),
            Slug::make('Slug')->from('Title')->required(),
            Text::make('Short Title')->nullable(),
            Number::make('Priority')->min(1)->max(20)->step(1)->hideWhenCreating()->nullable(),
            Boolean::make('A La Carte'),
            BelongsTo::make('Category Logo', 'image', nova('image'))->nullable()->showCreateRelationButton(),

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
