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
        Schema::create('planned_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('routine_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('exercise_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name');
            $table->integer('sets');
            $table->enum('target_type', \App\Enums\TargetType::asArray());
            $table->float('target');
            $table->integer('rest_time');
            $table->text('notes');
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
        Schema::dropIfExists('planned_exercises');
    }
};
