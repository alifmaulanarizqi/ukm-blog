<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->integer('ukm_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('konten')->nullable();
            $table->integer('headline_utama')->nullable();
            $table->integer('headline_ukm')->nullable();
            $table->string('tanggal');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
