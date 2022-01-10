<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_tour', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->comment('FK to tags')
                ->references('id')->on('tags')
                ->onDelete('cascade');
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('tour_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
                ->onDelete('cascade');
            $table->foreignId('vehicle_id')->comment('FK to vehicles')
                ->references('id')->on('vehicles')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('promotion_tour', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->comment('FK to promotions')
                ->references('id')->on('promotions')
                ->onDelete('cascade');
            $table->foreignId('tour_id')->comment('FK to tours')
                ->references('id')->on('tours')
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
        Schema::dropIfExists('tag_tour');
        Schema::dropIfExists('tour_vehicle');
        Schema::dropIfExists('promotion_tour');
    }
}
