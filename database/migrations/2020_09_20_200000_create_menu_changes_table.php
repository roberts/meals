<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Roberts\Meals\Models\Meal;

class CreateMenuChangesTable extends Migration
{
    public function up()
    {
        Schema::create('menu_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Menu::class)->nullable();
            $table->foreignIdFor(Menu::class, 'next_menu_id')->nullable();
            $table->foreignIdFor(Menu::class, 'ondeck_menu_id')->nullable();
            $table->dateTime('change_at'); // Thursdays at midnight
            $table->foreignIdFor(app('user'), 'creator_id')->nullable();
            $table->foreignIdFor(app('user'), 'updater_id')->nullable();
            $table->timestamps();
        });
    }
}
