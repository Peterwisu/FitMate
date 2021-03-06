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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('bmi');
            $table->unsignedInteger('bfp');
            $table->longText('bmi_cat');
            $table->longText('bfp_cat');
            $table->timestamps();
            $table->foreign('id')
            ->references("id")
            ->on('profiles')
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
        Schema::dropIfExists('healths');
    }
};
