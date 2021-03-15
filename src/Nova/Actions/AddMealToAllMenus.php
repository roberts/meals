<?php

namespace Roberts\Meals\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Roberts\Meals\Models\Menu;

class AddMealToAllMenus extends Action
{
    use InteractsWithQueue;
    use Queueable;

    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $menus = Menu::all()->pluck('id');
            $model->menus()->sync($menus);
        }

        return Action::message('The Meal was added to every Menu!');
    }

    public function fields()
    {
        return [];
    }
}
