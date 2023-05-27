<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            $table->string('name', 100);
            $table->string('description', 255);

            $table->bigInteger('author_id')->unsigned()->index()->nullable();
            $table->bigInteger('category_id')->unsigned()->index()->nullable();
            $table->bigInteger('publisher_id')->unsigned()->index()->nullable();
            $table->bigInteger('book_type_id')->unsigned()->index()->nullable();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('book_type_id')->references('id')->on('book_types');

            $table->date('publish_date')->nullable();
            $table->bigInteger('quantity')->nullable();
            $table->string('book_cover_photo')->nullable();
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
        Schema::dropIfExists('books');
    }
}
