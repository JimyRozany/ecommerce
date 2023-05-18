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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('line_1');
            $table->string('line_2')->nullable();
            $table->string('province');
            $table->string('city');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('status'); /* "Paid" , "Unpaid" , "Shipped" , "Unshipped" */
            $table->decimal('total_price', 8 ,2); 
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
