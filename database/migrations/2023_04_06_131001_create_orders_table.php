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
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('order_id');
            $table->string('payment_mode');
            $table->string('order_type')->default('POS')->comment('POS, Mobile App, Web App');
            $table->string('status')->comment('not_pickedup and Delivered');
            $table->string('order_status')->default('new')->comment('new and old');
            $table->timestamps();
            $table->softDeletes();

            $table->index('order_id');
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
