<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('category_uuid');
            $table->string('title',255);
            $table->double('price',12,2);
            $table->text('description');
            $table->json('metadata');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('category_uuid')->references('uuid')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
