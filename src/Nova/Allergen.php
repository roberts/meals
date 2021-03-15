<?php

namespace Roberts\Meals\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class Allergen extends BaseResource
{
    public static $model = \Roberts\Meals\Allergen::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'slug',
        'title',
        'contains',
    ];

    public static $group = 'Operations';

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')->sortable(),
            Text::make('Title')->sortable(),
            Text::make('Contains')->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Title')->required(),
            Slug::make('Slug')->from('Title'),
            Text::make('Contains')->nullable(),
            Boolean::make('Contain in List?', 'is_containable')->default(1),

            new Panel('Media Fields', $this->mediaFields()),
            BelongsToMany::make('Meals'),
            BelongsToMany::make('Users'),
            new Panel('Data Fields', $this->dataFields()),
        ];
    }

    protected function mediaFields()
    {
        return [
            BelongsTo::make('Icon', 'icon', nova('image'))->nullable()->showCreateRelationButton(),
            BelongsTo::make('Image', 'image', nova('image'))->nullable()->showCreateRelationButton(),
        ];
    }

    protected function dataFields(): array
    {
        return array_merge(
            parent::dataFields(),
            $this->creatorDataFields(),
        );
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
