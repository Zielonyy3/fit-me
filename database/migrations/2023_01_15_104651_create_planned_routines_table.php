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
        Schema::create('planned_routines', function (Blueprint $table) {
            $table->id();
            $table->integer('start_day');
            $table->integer('end_day');

            $table->foreignId('workout_plan_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('routine_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planned_routines');
    }
};
