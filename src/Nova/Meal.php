<?php

namespace Roberts\Meals\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Tipoff\Support\Nova\BaseResource;

class Meal extends BaseResource
{
    public static $model = \Roberts\Meals\Meal::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'slug',
        'title',
        'name',
    ];

    public static $group = 'Ecommerce Items';

    public function fieldsForIndex(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')->sortable(),
            Text::make('Title')->sortable(),
            Currency::make('Price')->asMinorUnits()->sortable(),
        ];
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Title')->required(),
            Slug::make('Slug')->from('Title')->required(),
            Text::make('Name')->nullable(),
            Currency::make('Price')->required()->asMinorUnits()
                ->step('0.01')
                ->resolveUsing(function ($value) {
                    return $value / 100;
                })
                ->fillUsing(function ($request, $model, $attribute) {
                    $model->$attribute = $request->$attribute * 100;
                }),
            Number::make('Servings')->nullable(),
            Number::make('Serving Size (ounces)', 'serving_size')->nullable(),
            Text::make('ReciPal ID', 'recipal')->nullable(),

            new Panel('Info Fields', $this->infoFields()),
            BelongsToMany::make('Allergens'),
            BelongsToMany::make('Categories'),
            BelongsToMany::make('Menus'),
            new Panel('Nutritional Facts from ReciPal', $this->nutritionalFacts()),
            new Panel('Data Fields', $this->dataFields()),
        ];
    }

    protected function infoFields()
    {
        return [
            Textarea::make('Description')->alwaysShow()->nullable(),
            Textarea::make('Ingredients List', 'display_ingredients')->alwaysShow()->nullable(),
            BelongsTo::make('Plated Meal Image', 'image', nova('image'))->nullable()->showCreateRelationButton(),
            BelongsTo::make('Meal Package Image', 'package_image', nova('image'))->nullable()->showCreateRelationButton(),
        ];
    }

    protected function nutritionalFacts()
    {
        return [
            Number::make('Serving Size')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Calories')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Total Fat', 'fat')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Saturated Fat')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Trans Fat')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Cholesterol')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Sodium')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Total Carbohydrates', 'carbs')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Dietary Fiber', 'fiber')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Total Sugars', 'sugars')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Added Sugars')->hideWhenCreating()->hideWhenUpdating(),
            Number::make('Protein')->hideWhenCreating()->hideWhenUpdating(),
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

    public function actions(Request $request)
    {
        return [new Actions\AddMealToAllMenus];
    }

    public function authorizedToForceDelete(Request $request)
    {
        return false;
    }
}
