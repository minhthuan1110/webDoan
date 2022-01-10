<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->comment('FK to admins')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->string('image_path', 2048)->nullable();
            $table->tinyInteger('display')->default(1)->comment('1 là hiển thị');
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
        Schema::dropIfExists('sliders');
    }
}
