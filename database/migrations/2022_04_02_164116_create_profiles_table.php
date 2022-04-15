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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->enum('title', ['Mr.', 'Mrs.', 'Ms.','Dr.','Prof.']);
            $table->enum('gender',['male','female']);
            $table->enum('act_level',['Sedentary','Light','Moderate','Active','VeryActive','ExtremelyActive']);
            $table->date('date_of_birth');
            $table->unsignedInteger('height');
            $table->unsignedInteger('weight');
            $table->unsignedInteger('neck');
            $table->unsignedInteger('waist');
            $table->timestamps();
            $table->foreign('id')
            ->references("id")
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
