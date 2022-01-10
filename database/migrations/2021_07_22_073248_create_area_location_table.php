<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable()->comment('Mô tả chi tiết về khu vực');
            $table->tinyInteger('domestic')->default(1)->comment('1 là trong nuớc');
            $table->string('image_path', 2048)->nullable();
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('area_id')->comment('FK to areas')
                ->references('id')->on('areas')
                ->onDelete('cascade');
            $table->string('name');
            $table->longText('description')->nullable()->comment('Mô tả chi tiết về địa điểm');
            $table->string('image_path', 2048)->nullable();
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
        Schema::dropIfExists('areas');
        Schema::dropIfExists('locations');
    }
}
