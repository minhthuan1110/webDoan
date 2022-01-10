<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->comment('FK to admins')
                ->references('id')->on('admins')
                ->onDelete('cascade');
            $table->string('title');
            $table->string('image_path', 2048)->nullable();
            $table->longText('content');
            $table->tinyInteger('display')->default(1)->comment('1 là hiển thị');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
