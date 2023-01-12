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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('coffe_start_at')->nullable();
            $table->time('coffe_end_at')->nullable();

            $table->time('lunch_start_at')->nullable();
            $table->time('lunch_end_at')->nullable();

            $table->time('dinner_start_at')->nullable();
            $table->time('dinner_end_at')->nullable();

            $table->foreignId('campus_id')->nullable()->constrained('campuses');
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
        Schema::dropIfExists('restaurants');
    }
};
