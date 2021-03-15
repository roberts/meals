<?php

namespace Roberts\Meals\Nova\Actions;

use Roberts\Meals\Models\Menu;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class AddMealToAllMenus extends Action
{
    use InteractsWithQueue, Queueable;

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
