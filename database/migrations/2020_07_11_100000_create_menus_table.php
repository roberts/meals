<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Internal Reference Only. "Week 1" through "Week 26"
            $table->boolean('is_active')->default(0); // Not editable from Admin, just displayed.

            $table->foreignId('creator_id')->references('id')->on('users');
            $table->foreignId('updater_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
}
