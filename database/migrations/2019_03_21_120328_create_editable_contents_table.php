<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditableContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editable_contents', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('category');
            $table->enum('type', ['text', 'textarea', 'image', 'checkbox'])->default('text');
            $table->string('title', 50);
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->foreign('category')->references('category')->on('editable_content_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('editable_contents');
    }
}
