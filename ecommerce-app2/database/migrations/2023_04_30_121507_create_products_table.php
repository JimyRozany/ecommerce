<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');

            $table->string('name');
            $table->text('description');
            $table->integer('quantity'); // quantity in stock
            $table->boolean('status'); // publish or draft
            $table->decimal('price');
            $table->string('image_path'); // product image
            $table->softDeletes(); // hidden  post
            $table->timestamps();

            $table->foreign('seller_id')
                ->references('id')
                ->on('sellers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
