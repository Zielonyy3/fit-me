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
            $table->integer('sets')->default(1);
            $table->enum('target_type', \App\Enums\TargetType::asArray())->default(\App\Enums\TargetType::Weight);
            $table->float('target')->default(1);
            $table->integer('rest_time')->default(1);
            $table->text('notes')->nullable();
            $table->integer('order')->default(0);
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
