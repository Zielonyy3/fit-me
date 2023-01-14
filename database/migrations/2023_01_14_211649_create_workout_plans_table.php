<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workout_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();


            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('routine_workout_plan', function (Blueprint $table) {
            $table->id();
            $table->integer('start_day');
            $table->integer('end_day');

            $table->foreignId('workout_plan_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('routine_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->text('notes');

            $table->index(['workout_plan_id', 'routine_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workout_plans');
    }
};
