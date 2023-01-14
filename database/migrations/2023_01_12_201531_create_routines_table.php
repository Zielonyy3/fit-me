<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('owner_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()->cascadeOnUpdate();
        });

        Schema::create('routines_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreignId('routine_id')
                ->constrained()
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

            $table->index(['user_id', 'routine_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routines');
        Schema::dropIfExists('routines_users');
    }
};
