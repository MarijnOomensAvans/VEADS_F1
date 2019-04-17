<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstagramPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_posts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('page_name');
            $table->foreign('page_name')->references('name')->on('instagram_pages');
            $table->longText('image_url');
            $table->longText('message')->nullable();
            $table->longText('url');
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
        Schema::dropIfExists('instagram_posts');
    }
}
